<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth as AuthAuth;
use App\Project;
use App\Transfers;
use App\User;
use Illuminate\Support\Facades\Validator;

class NormalUserController extends Controller
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
     * Updating Projects API
     *
     * @return \Illuminate\Http\Response
     */
    public function UploadFiles(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'file' => 'required',
            ]
        );

        if ($validator->passes()) {

            $project = Project::where("id", $request->id)->first();
            $filesPath =        json_decode($project->filespath, true);
            $files = $request->file('file');

            foreach ($files as $file) {


                $filesPath[$file->getClientOriginalName()] =  $file->store("public/FilesUsers");
            }
            $project->filespath = json_encode($filesPath);

            $project->save();

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


    /**
     * Updating Projects API
     *
     * @return \Illuminate\Http\Response
     */
    public function UpdatingProjectsAPI(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'idprject' => 'required',
                'jsondata' => 'required',
            ]
        );

        if ($validator->passes()) {
            $project = Project::where("id", $request->idprject)->first();
            $project->json = $request->jsondata;
            $project->save();



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

    public function ShowAllProjects()
    {
        $projects =   Project::where("users_id", AuthAuth::id())->get();
        foreach ($projects as $key =>  $project) {

            $projects[$key]->data = json_decode($projects[$key]->json);
            $projects[$key]->files = json_decode($projects[$key]->filespath, true);
        }

        return view('UserControl.Users.ShowProjects')->with("projects", $projects);
    }
    /**
     * remove project api
     *
     * @return \Illuminate\Http\Response
     */
    public function removeprojectapi(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',

            ]
        );

        if ($validator->passes()) {
            $porject =    Project::where("id", $request->idprject)->first();
            if ($porject->isfinsh)
                Project::where("id", $request->idprject)->delete();
            else
                return response()->json([
                    'error' => 1,
                    'data' => ["the project is not isfinsh "]

                ]);

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
    /**
     * end project api
     *
     * @return \Illuminate\Http\Response
     */
    public function endprojectapi(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',

            ]
        );

        if ($validator->passes()) {
            $project =   Project::where("id", $request->idprject)->first();
            $project->isfinsh = true;
            $cost =  $project->cost;
            $user = AuthAuth::user();
            $user_Touser = User::where("id",  $project->freelancer_id)->first();
            $user_Touser->money += $cost;
            $user->money -= $cost;


            $transfers = new Transfers();
            $transfers->form_users_id = $user->id;
            $transfers->to_users_id = $project->freelancer_id;
            $transfers->projects_id = $project->id;
            $transfers->value = $project->cost;

            $user_Touser->save();
            $transfers->save();
            $user->save();
            $project->save();
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
}
