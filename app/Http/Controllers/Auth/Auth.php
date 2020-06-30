<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth as vvv;
use App\User;
use App\plans;

class Auth extends vvv
{
    public const USER_ID = 0;
    public const ADMIN_ID = 1;
    public const FREELANCER_ID = 2;
    public  static function isadmin()
    {
        $auth =  User::where('plan_id', self::ADMIN_ID)->where('id', Auth::id())->first();

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
        $auth =  User::where('plan_id', self::FREELANCER_ID)->where('id', Auth::id())->first();

        if ($auth == null)
            return FALSE;
        else
            return TRUE;
    }
    public  static function isNormalUser()
    {
        $auth =  User::where('plan_id', self::USER_ID)->where('id', Auth::id())->first();

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
