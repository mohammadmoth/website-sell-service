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
        if ($validator->passes() && $request->ORDERSTATUS == "COMPLETE") {

            if (Cache::has($request->REFNOEXT) &&  !isset(Cache::get($request->REFNOEXT)->RunBefor)) {
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
