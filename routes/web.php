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

use App\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $savedata = [];
        if (!Cache::has("DataOfWelcomeUserItems")) {

            $items = Items::get();
            foreach ($items as $item) {
                $item->json = json_decode($item->json);
                if (isset($item->json->show) && $item->json->show)
                    $savedata[] = $item;
            }
            $savedata = array_chunk($savedata, 3);
            Cache::put("DataOfWelcomeUserItems", $savedata, now()->addDay());
        } else {
            $savedata = Cache::get('DataOfWelcomeUserItems');
        }



        return view('welcome')->with("Arrayplans", $savedata);
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
    Route::post("/api/hookstripe", 'GitAndPaymentController@WebHooksStrip');
    //  Route::get('/api/ipn', 'GitAndPaymentController@ipn');

    Route::get('/PrivacyPolicy', function () {
        return view("PrivacyPolicy");
    })->name('PrivacyPolicy');
    Route::get('/FeesTOT', function () {
        return view("FeesTOT");
    })->name('FeesTOT');
});
