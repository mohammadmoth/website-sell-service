<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Auth as AuthAuth;
use App\Project;
use Illuminate\Support\Facades\Crypt;

class FreelancerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('freelancer');
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function APIFreelancerLogin(Request $request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required|exists:users,id',
                    'projects' => 'required|exists:projects,id'
                ]
            );

            if ($validator->passes()) {

                if (Project::where("id", $request->projects)->first()->freelancer_id != AuthAuth::id()) {

                    return response()->json([
                        "data" => ["Can't Login This user !"]

                    ], 400);
                }
                $encrypted = Crypt::encrypt(json_encode(["date" => time(), 'id' => $request->input('id')]));

                $subdomin =  "";  //     \Illuminate\Support\Str::random() ;


                $data = ("http://" . $subdomin . env('UrlLogin') . '/LoginUserByAdmin?token=' . $encrypted);

                return response()->json([
                    'error' => 0,
                    'data' => $data

                ]);
            } else {
                return response()->json([
                    'error' => 1,
                    'data' => $validator->errors()
                        ->all()
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "data" => ["line: $th->getLine(), type: '$th->getMessage()'"]

            ], 400);
        }
    }
}
