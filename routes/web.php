<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::middleware('langconfing')->group(function () {


    Route::get('/emails/{name}', function ($name, Request $req) {
        $vi =  view('emails.' . $name);
        foreach ($req->input() as  $key => $value) {
            $vi->with($key, $value);
        }
        return  $vi;
    });



    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    })->name("/");



    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/signupuser', 'Auth\RegisterController@signupNromalUser')
        ->name('signupuser');

    Route::post('/signupuser', 'Auth\RegisterController@signupNromalUserReg')
        ->name('signupNromalUserReg');




    Route::get('/lang/{key}', function ($key) {
        session()->put('locale', $key);
        return redirect()->back();
    });



    Route::get('/edit-info', 'HomeController@updateinforamtion')->name('edit-info');
    Route::post('api/edit-info', 'HomeController@updateinforamtionAPI');

    Route::get('/LoginUserByAdmin', 'LoginController@LoginUserByAdmin')->name('LoginUserByAdmin');

    Route::post('/api/ipn', 'GitAndPaymentController@ipn');
    //  Route::get('/api/ipn', 'GitAndPaymentController@ipn');

    Route::get('/PrivacyPolicy', function () {
        return view("PrivacyPolicy");
    })->name('PrivacyPolicy');
    Route::get('/FeesTOT', function () {
        return view("FeesTOT");
    })->name('FeesTOT');
});
