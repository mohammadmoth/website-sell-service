<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function LoginUserByAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'token' => 'required|string|max:255'

        ]);
        if ($validator->passes()) {

            $decodercode = json_decode(Crypt::decrypt($request->input('token')));
            if (($decodercode->date + 360) > time()) {

                Auth::logout();
                Auth::loginUsingId($decodercode->id);
                return redirect(route('home'));
            } else {
                $validator->errors()->add('token_is', 'token_is_viled');
                goto error;
            }
            return response()->json([
                'error' => 0
            ]);
        } else {
            error: return response()->json([
                'error' => 1,
                'data' => $validator->errors()
                    ->all()
            ]);
        }
    }
}
