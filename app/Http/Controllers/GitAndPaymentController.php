<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth;
use App\Jobs\AddProjectAndInvoice;
use App\Jobs\SendConfJob;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailsJob;
use App\Mail\SendConf;
use Illuminate\Support\Facades\Cache;
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
            $signature    = $_POST["HASH"];    /* HASH received */
            $body        = "";

            foreach ($_POST as $key => $val) {

                /* get values */
                if ($key != "HASH") {
                    if (is_array($val)) $result .= $this->ArrayExpand($val);
                    else {
                        $size        = strlen(StripSlashes($val)); /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
                        $result    .= $size . StripSlashes($val);  /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
                    }
                }
            }
            $date_return = date("YmdHis");
            $return = strlen($_POST["IPN_PID"][0]) . $_POST["IPN_PID"][0] . strlen($_POST["IPN_PNAME"][0]) . $_POST["IPN_PNAME"][0];
            $return .= strlen($_POST["IPN_DATE"]) . $_POST["IPN_DATE"] . strlen($date_return) . $date_return;
            $hash =  $this->hmac($pass, $result); /* HASH for data received */
            $body .= $result . "\r\n\r\nHash: " . $hash . "\r\n\r\nSignature: " . $signature . "\r\n\r\nReturnSTR: " . $return;
            if ($hash == $signature) {
                echo "Verified OK!";
                /* ePayment response */
                $result_hash =  $this->hmac($pass, $return);
                echo "<EPAYMENT>" . $date_return . "|" . $result_hash . "</EPAYMENT>";
                /* Begin automated procedures (START YOUR CODE)*/
                echo "REFNOEXT:" . $_POST["REFNOEXT"];
                $details = [
                    'email' => env("MAIL_ADMIN"),
                    "data" => ["errors" => "Ok :" . $request->REFNOEXT, "code" => "002"],
                    "view" => "Error",
                    "subject" => "Pay Ok"
                ];
                SendEmailsJob::dispatch($details);
            } else {

                $details = [
                    'email' => env("MAIL_ADMIN"),
                    "data" => ["errors" => "Error :" . $request->REFNOEXT, "code" => "001"],
                    "view" => "Error",
                    "subject" => "Pay Error"
                ];
                SendEmailsJob::dispatch($details);
            }

            /*
            if (Cache::has($request->REFNOEXT) && $request->ORDERSTATUS == "COMPLETE" &&   !isset(Cache::get($request->REFNOEXT)->RunBefor)) {
                $d =    Cache::get($request->REFNOEXT);
                $d->RunBefor = true;
                Cache::put($request->REFNOEXT, $d, now()->addDays(30));

                echo "Verified OK!";


                AddProjectAndInvoice::dispatch($request->REFNOEXT);
            } else {

                $details = [
                    'email' => env("MAIL_ADMIN"),
                    "data" => ["errors" => "Error :" . $request->REFNOEXT, "code" => "001"],
                    "view" => "Error",
                    "subject" => "Pay Error"
                ];
                SendEmailsJob::dispatch($details);
                // Mail::to(env("MAIL_ADMIN"))->send(new SendConf($name));
            }
            */


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

    private  function ArrayExpand($array)
    {
        $retval = "";
        for ($i = 0; $i < sizeof($array); $i++) {
            $size        = strlen(StripSlashes($array[$i]));  /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
            $retval    .= $size . StripSlashes($array[$i]);  /*StripSlashes function to be used only for PHP versions <= PHP 5.3.0, only if the magic_quotes_gpc function is enabled */
        }
        return $retval;
    }
    private   function hmac($key, $data)
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
}
