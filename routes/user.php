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
Route::middleware(['langconfing', 'isuser'])->group(function () {
    Route::get('/showallprojects', 'NormalUserController@ShowAllProjects')->name('showallprojects');
    Route::post('/api/saveproject', 'NormalUserController@saveproject')->name('saveproject');
    Route::post('/api/uploadfiles', 'NormalUserController@uploadfiles')->name('uploadfiles');

    Route::post('/api/removeprojectapi', 'NormalUserController@removeprojectapi')->name('removeprojectapi');
    Route::post('/api/endprojectapi', 'NormalUserController@endprojectapi')->name('endprojectapi');



    Route::get('/PurchaseItem', 'NormalUserController@PurchaseItem')->name('PurchaseItem');
    Route::post('/api/purchaseapi', 'NormalUserController@purchaseapi')->name('purchaseapi');



    Route::get('/Invoices', 'NormalUserController@Invoices')->name('Invoices');




    Route::get('/itemInvoices', 'NormalUserController@itemInvoices')->name('itemInvoices');




    Route::get('/AddMoney', 'NormalUserController@ViewAddMoney')->name('ViewAddMoney');
    Route::post('/api/AddMoneyApi', 'NormalUserController@AddMoneyApi')->name('AddMoneyApi');
});
