<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Auth as AuthAuth;
use App\Jobs\SendEmailsJob;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowAllProjects(Request $request)
    {
        $Projects =     Project::get();

        return view("UserControl.Admin.ShowAllProjects")
            ->with(
                "Projects",
                $Projects

            );
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowProjectNotConf(Request $request)
    {
        $Projects =     Project::get();

        return view("UserControl.Admin.ShowProjectNotConf")
            ->with(
                "Projects",
                $Projects

            );
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowProjectNotSetToFreelancser(Request $request)
    {
        $Projects =     Project::get();

        return view("UserControl.Admin.ShowProjectNotSetToFreelancser")
            ->with(
                "Projects",
                $Projects

            );
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowAllFreelancser(Request $request)
    {
        $Projects =     Project::get();

        return view("UserControl.Admin.ShowAllFreelancser")
            ->with(
                "Projects",
                $Projects

            );
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowAllUsers(Request $request)
    {
        $Projects =     Project::get();

        return view("UserControl.Admin.ShowAllUsers")
            ->with(
                "Projects",
                $Projects

            );
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function APIGetAllUsers(Request $request)
    {
        try {
            //code...

            $Users =     User::where("plan_id", AuthAuth::USER_ID)->get();

            foreach ($Users as $user) {

                $user->projects =     Project::where("id",  $user->id)->get();
            }
            return response()->json([
                "data" => $Users

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "data" => ["line" => $th->getLine(), "type" => $th->getMessage()]

            ], 400);
        }
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function APIGetAllFreeLancer(Request $request)
    {
        try {
            //code...

            $Users =     User::where("plan_id", AuthAuth::FREELANCER_ID)->get();

            foreach ($Users as $user) {

                $user->projects =     Project::where("id",  $user->id)->get();
            }
            return response()->json([
                "data" => $Users

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "data" => ["line" => $th->getLine(), "type" => $th->getMessage()]

            ], 400);
        }
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function APIShowAllProjects(Request $request)
    {
        try {
            //code...

            $projects =     Project::get();
            foreach ($projects as $project) {

                $project->user =           User::where("id",  $project->users_id)->first();
                $project->freelancer =     User::where("id",  $project->freelancer_id)->first();
            }
            return response()->json([
                "data" => $projects

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "data" => ["line" => $th->getLine(), "type" => $th->getMessage()]

            ], 400);
        }
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function APIAdminLogin(Request $request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required|exists:users,id'
                ]
            );

            if ($validator->passes()) {

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

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function APIAdminUpdateProject(Request $request)
    {
        //   "users_id", 'name', 'json',  'filespath', "isfinsh", "cost", "freelancer_id"
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required|exists:projects,id',
                    'freelancer_id' => 'required|exists:users,id',

                ]
            );

            if ($validator->passes()) {

                $project = Project::where("id", $request->id)->first();
                if ($project->freelancer_id <= 0) {
                    $details = [
                        'email' => User::where("id", $project->users_id)->first()->email,
                        "data" => ["projectname" => $project->name],
                        "view" => "ProjectHasBeenImprovement",
                        "subject" => "Project Has Been Improvement"
                    ];
                    SendEmailsJob::dispatch($details);
                }
                $project->freelancer_id = $request->freelancer_id;
                $project->save();

                return response()->json([
                    'error' => 0,

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
                "data" => ["line: " . $th->getLine() . ", type: '" . $th->getMessage() . "'"]

            ], 400);
        }
    }
}
