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
Route::middleware(['langconfing', 'admin'])->group(function () {


    Route::get('/ShowAllUsers', 'AdminController@ShowAllUsers')->name('ShowAllUsers');
    Route::get('/ShowProjectNotConf', 'AdminController@ShowProjectNotConf')->name('ShowProjectNotConf');
    Route::get('/ShowProjectNotSetToFreelancser', 'AdminController@ShowProjectNotSetToFreelancser')->name('ShowProjectNotSetToFreelancser');
    Route::get('/ShowAllFreelancser', 'AdminController@ShowAllFreelancser')->name('ShowAllFreelancser');
    Route::get('/ShowAllProjects', 'AdminController@ShowAllProjects')->name('ShowAllProjects');






    //  Route::post('/api/ShowProjectNotConf', 'AdminController@saveproject')->name('saveproject');
    //  Route::post('/api/uploadfiles', 'NormalUserController@uploadfiles')->name('uploadfiles');

    ///////////////api

    Route::post('/api/admin/users', 'AdminController@APIGetAllUsers')
        ->name('APIGetAllUsers');
    Route::post('/api/admin/users/login', 'AdminController@APIAdminLogin')
        ->name('APIAdminLogin');


    Route::post('/api/admin/usersFree', 'AdminController@APIGetAllFreeLancer')
        ->name('APIGetAllFreeLancer');


    Route::post('/api/admin/APIShowAllProjects', 'AdminController@APIShowAllProjects')
        ->name('APIShowAllProjects');

    Route::post('/api/admin/APIAdminUpdateProject', 'AdminController@APIAdminUpdateProject')
        ->name('APIAdminUpdateProject');
});
