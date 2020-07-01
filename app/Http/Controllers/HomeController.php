<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth;
use App\Items;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Validator;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::isNormalUser()) {
            $allProjects = Project::where("users_id", Auth::id())->get();
            $items = Items::all();
            return view('home')
                ->with("allProjects",   $allProjects)
                ->with("items", $items);
        } elseif (Auth::isFreelancer()) {

            $allProjects = Project::where("freelancer_id", Auth::id())->get();
            $items = Items::all();
            return view('homeFreelancer')
                ->with("allProjects",   $allProjects)
                ->with("items", $items);
        } elseif (Auth::isadmin()) {
            $arrayout = new stdClass();
            $arrayout->TotalMoney = User::GetTotalMoney();

            $arrayout->Withdrawal = User::GetWithdrawal();
            $arrayout->UsersCount = User::GetUsersCount();

            $arrayout->FreelancerCount = User::GetFreelancerCount();
            $arrayout->TotalSpend = User::GetTotalSpend();
            $arrayout->ProjectAtiveCount = Project::ProjectAtiveCount();

            $arrayout->ProjectPending = Project::GetProjectPending();

            $arrayout->allProjects = Project::where("users_id", Auth::id())->get();

            return view('homeAdmin')
                ->with("out", $arrayout);
        }
    }

    /**
     * Update Information User Api
     *
     * @return \Illuminate\Http\Response
     */
    public function updateinforamtionAPI(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'lastname' => 'required',
                'county' => 'required',
                'city' => 'required',
                'street' => 'required',
                'zip' => 'required',
                'phone' => 'required',
                'mobile' => 'required',
                'whatsapp' => 'required'
            ]
        );

        if ($validator->passes()) {

            $user = User::where("id", Auth::id())->first();
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->city = $request->city;
            $user->county = $request->county;
            $user->street = $request->street;
            $user->zip = $request->zip;
            $user->phone = $request->phone;
            $user->mobile = $request->mobile;
            $user->whatsapp = $request->whatsapp;
            $user->save();


            return response()->json([
                'error' => 0
            ]);
        } else {
            return response()->json([
                'error' => 1,
                'data' => $validator->errors()
                    ->all()
            ], 400);
        }
    }

    public function updateinforamtion()
    {
        return view('UserControl.Dashboard.Changeyourinfo')->with("user",  User::where("id", Auth::id())->first());
    }
}
