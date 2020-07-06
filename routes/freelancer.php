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
Route::middleware(['langconfing', 'freelancer'])->group(function () {

    Route::post('/api/freelancer/users/login', 'FreelancerController@APIFreelancerLogin')
        ->name('APIFreelancerLogin');


    //      Route::get('/PurchaseItem', 'FreelancerController@PurchaseItem')->name('PurchaseItem');
    //      Route::post('/api/purchaseapi', 'FreelancerController@purchaseapi')->name('purchaseapi');



    Route::get('/InvoicesFree', 'FreelancerController@InvoicesFree')->name('InvoicesFree');




    Route::get('/ViewGetMoneyFree', 'FreelancerController@ViewGetMoneyFree')->name('ViewGetMoneyFree');

    Route::post('/api/AskMoneyFreel', 'FreelancerController@AskMoneyFreel')->name('AskMoneyFreel');


});
