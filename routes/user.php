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
    Route::get('/showallprojects', 'NormalUserController@ShowAllProjects')->name('showallprojects');

    Route::post('/api/uploadfiles', 'NormalUserController@uploadfiles')->name('uploadfiles');

    Route::post('/api/removeprojectapi', 'NormalUserController@removeprojectapi')->name('removeprojectapi');
    Route::post('/api/endprojectapi', 'NormalUserController@endprojectapi')->name('endprojectapi');



    Route::get('/PurchaseItem', 'NormalUserController@PurchaseItem')->name('PurchaseItem');




    Route::get('/Invoices', 'NormalUserController@Invoices')->name('Invoices');




});
