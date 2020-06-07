<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth as vvv;
use App\User;
use App\plans;

class Auth extends vvv
{
    public  static function isadmin()
    {
        $auth =  User::where('plan_id', '1')->where('id', Auth::id())->first();

        if ($auth == null)
            return FALSE;
        else
            return TRUE;
    }
    public static function plansRetunNameBy($id)
    {
        $plans = new plans();

        return $plans->where('id', $id)->first()->name;
    }
    public  static function isFreelancer()
    {
        $auth =  User::where('plan_id', '2')->where('id', Auth::id())->first();

        if ($auth == null)
            return FALSE;
        else
            return TRUE;
    }
    public static function  emailisconfig($request)
    {

        $Users = new User();
        $Auth =    $Users->where('email', $request->email)
            ->where('emailconf', '1')->first();

        if (isset($Auth))
            return TRUE;
        return FALSE;
    }
}
