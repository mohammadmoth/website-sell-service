<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth;
use App\Jobs\AddProjectAndInvoice;
use App\Jobs\SendConfJob;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailsJob;
use App\Mail\SendConf;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GitAndPaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function ipn(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'HASH' => 'required',
            'IPN_PID' => 'required',
            'IPN_DATE' => 'required',
            'IPN_PNAME' => 'required',

        ]);
        if ($validator->passes()) {

            $pass        = "2pK3%_ZyhWG&CE7[w^(z";    /* pass to compute HASH */
            $result        = "";                 /* string for compute HASH for received data */
            $return        = "";                 /* string to compute HASH for return result */
            $signature    = $request->input["HASH"];    /* HASH received */
            $body        = "";
            /* read info received */
            ob_start();
            while (list($key, $val) = each($_POST)) {
                $$key = $val;
                /* get values */
                if ($key != "HASH") {
                    if (is_array($val)) $result .= ArrayExpand($val);
                    else {
                        $size        = strlen(StripSlashes($val)); /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
                        $result    .= $size . StripSlashes($val);  /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
                    }
                }
            }
            $body = ob_get_contents();
            ob_end_flush();
            $date_return = date("YmdHis");
            $return = strlen($request->input["IPN_PID"][0]) . $request->input["IPN_PID"][0] . strlen($request->input["IPN_PNAME"][0]) . $request->input["IPN_PNAME"][0];
            $return .= strlen($request->input["IPN_DATE"]) . $request->input["IPN_DATE"] . strlen($date_return) . $date_return;
            function ArrayExpand($array)
            {
                $retval = "";
                for ($i = 0; $i < sizeof($array); $i++) {
                    $size        = strlen(StripSlashes($array[$i]));  /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
                    $retval    .= $size . StripSlashes($array[$i]);  /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
                }
                return $retval;
            }
            function hmac($key, $data)
            {
                $b = 64; // byte length for md5
                if (strlen($key) > $b) {
                    $key = pack("H*", md5($key));
                }
                $key  = str_pad($key, $b, chr(0x00));
                $ipad = str_pad('', $b, chr(0x36));
                $opad = str_pad('', $b, chr(0x5c));
                $k_ipad = $key ^ $ipad;
                $k_opad = $key ^ $opad;
                return md5($k_opad  . pack("H*", md5($k_ipad . $data)));
            }
            $hash =  hmac($pass, $result); /* HASH for data received */
            $body .= $result . "\r\n\r\nHash: " . $hash . "\r\n\r\nSignature: " . $signature . "\r\n\r\nReturnSTR: " . $return;
            if ($hash == $signature) {
                echo "Verified OK!";
                /* ePayment response */
                $result_hash =  hmac($pass, $return);
                echo "<EPAYMENT>" . $date_return . "|" . $result_hash . "</EPAYMENT>";
                /* Begin automated procedures (START YOUR CODE)*/
                AddProjectAndInvoice::dispatch($request->REFNOEXT);
            } else {

                $details = [
                    'email' => env("MAIL_ADMIN"),
                    "data" => ["errors" => "Error On Verified ", "code" => "001"],
                    "view" => "Error",
                    "subject" => "Pay Error"
                ];
                SendEmailsJob::dispatch($details);
                // Mail::to(env("MAIL_ADMIN"))->send(new SendConf($name));
            }



            return response()->json([
                'error' => 0
            ]);
        } else {
            error: return response()->json([
                'error' => 1,
                'data' => $validator->errors()
                    ->all()
            ]);
        }
    }
}
