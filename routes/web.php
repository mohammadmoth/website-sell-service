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
Route::middleware('langconfing')->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });



    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/lang/{key}', function ($key) {
        session()->put('locale', $key);
        return redirect()->back();
    });



    Route::get('/edit-info', 'HomeController@updateinforamtion')->name('edit-info');
    Route::post('api/edit-info', 'HomeController@updateinforamtionAPI');
});
