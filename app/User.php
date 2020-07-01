<?php

namespace App;

use App\Http\Controllers\Auth\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname',  'email', 'password', "plan_id", 'address', 'city', 'street', 'zip', "phone", "mobile", "whatsapp", "money", "status", "moneyspins"

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function GetWithdrawal()
    {

        //TODO Add Cache


        return User::Get()->sum('money');
    }
    public static function GetUsersCount()
    {

        //TODO Add Cache


        return User::where("plan_id", Auth::USER_ID)->Get()->sum('money');
    }
    public static function GetTotalMoney()
    {

        //TODO Add Cache


        return User::where("plan_id", Auth::USER_ID)->Get()->sum('money');
    }
    public static function GetFreelancerCount()
    {

        //TODO Add Cache


        return User::where("plan_id", Auth::USER_ID)->Get()->sum('money');
    }
    public static function GetTotalSpend()
    {

        //TODO Add Cache


        return User::where("plan_id", Auth::USER_ID)->Get()->sum('money');
    }



}
