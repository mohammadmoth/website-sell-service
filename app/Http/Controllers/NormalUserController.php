<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth as AuthAuth;
use App\Invoices;
use App\InvoicesItems;
use App\Items;
use App\Jobs\SendEmailsJob;
use App\Project;
use App\Transfers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use stdClass;

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
        $this->middleware('isuser');
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

                $filename = $file->getClientOriginalName();
                ChangeName:
                if (!empty($filesPath[$filename])) {


                    $filename = rand(0, 1000) . "_" . $filename;
                    goto ChangeName;
                }


                $filesPath[$filename] =  $file->store("public/FilesUsers");
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
     * Save Projects API
     *
     * @return \Illuminate\Http\Response
     */
    public function saveproject(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'usernotes' => 'nullable',
                'devnotes' => 'nullable',
            ]
        );

        if ($validator->passes()) {

            $project = Project::where("id", $request->id)->first(); //TODO confirm the project owner user

            $data = json_decode($project->json);
            if (!is_object($data)) {
                $data = new stdClass();
            }
            $data->devnotes = $request->devnotes;
            $data->usernotes = $request->usernotes;
            $project->json = json_encode($data);
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
            $porject =    Project::where("id", $request->id)->first();
            if ($porject->isfinsh)
                Project::where("id", $request->id)->delete();
            else
                return response()->json([
                    'error' => 1,
                    'data' => ["the project have not finish"]

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
     * View page add money
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewAddMoney(Request $request)
    {

        $money = $request->money;
        if (!is_numeric($money))
            $money = 100;


        return view("UserControl.Users.InvoiceSystem.AddMoney")->with("money", $money);
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
            $project =   Project::where("id", $request->id)->first();
            $project->isfinsh = true;
            $cost =  $project->cost;
            $user = AuthAuth::user();
            if ($project->freelancer_id == 0) {
                return response()->json([
                    'error' => 1,
                    'data' => ["No Freelancer Working on this project", "Please contact with us"]

                ]);
            }
            $user_Touser = User::where("id",  $project->freelancer_id)->first();
            $user_Touser->money += $cost;



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
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function PurchaseItem(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'items_id' => 'required',

            ]
        );

        if ($validator->passes()) {
            $item  =   Items::where("id", $request->items_id)->first();
            if ($item  == null) {

                return redirect("/404");
            }
            return view("UserControl.Users.InvoiceSystem.PurchaseItemStripe")->with("item", $item);
        } else {
            return redirect("/404");
        }
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function itemInvoices($Invoices_id, Request $request)
    {
        $request->Invoices_id = $Invoices_id;

        $validator = Validator::make(
            $request->all(),
            [
                'Invoices_id' => 'required',

            ]
        );

        if ($validator->passes()) {
            $Invoices  =   Invoices::where("id", $request->Invoices_id)->first();
            $Invoices->items  =   InvoicesItems::where("invoices_id", $request->Invoices_id)->get();
            if ($Invoices  == null) {

                return redirect("/404");
            }
            return view("UserControl.Users.InvoiceSystem.itemInvoices")->with("Invoices", $Invoices);
        } else {
            return redirect("/404");
        }
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function SendEmailConfPay(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',

            ]
        );

        if ($validator->passes() && Cache::has($request->id)) {
            $money = Items::where("id", Cache::get($request->id)->itemid)->first()->cost;

            $details = [
                // 'email' => $user->email,
                'email' => Auth::user()->email,
                "data" => ["Moeny" => $money],
                "view" => "MoneyPending",
                "subject" => "Payment Confirmed"
            ];
            SendEmailsJob::dispatch($details);
        }
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function purchaseapi(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required',

            ]
        );

        if ($validator->passes()) {
            $items  =   Items::where("id", $request->id)->first(); //         "name", 'deceptions', 'deceptionsLong', 'image', 'cost'
            $items->json = json_decode($items->json);
            $user = AuthAuth::user();
            if ($user->money - $user->moneyspins >= $items->cost) {

                //TODO اضافة مشروع للمستخدم
                //TODO اضافة فاتورة
                $project = new Project(); //   "users_id", 'name', 'json',  'filespath', "isfinsh", "cost", "freelancer_id"

                $project->users_id = $user->id;
                $project->name = $items->name;
                $project->json = "[]";
                $project->filespath = "[]";
                $project->isfinsh = false;
                $project->cost = $items->cost;
                $project->freelancer_id = 0;


                $Invoices = new Invoices(); //   "users_id", 'deceptions', 'cost'
                $Invoices->users_id = $user->id;
                $Invoices->deceptions = $items->deceptions;
                $Invoices->cost = $items->cost;
                $Invoices->save();

                $InvoicesItems = new InvoicesItems(); //   "invoices_id", 'cost', 'items_id', "count", "deceptions"
                $InvoicesItems->invoices_id   = $Invoices->id;
                $InvoicesItems->cost = $items->cost;
                $InvoicesItems->items_id = $items->id;
                $InvoicesItems->count = 1;
                $InvoicesItems->deceptions = $items->deceptions;
                $InvoicesItems->save();

                $user->money -= $items->cost;
                $project->save();
                $user->save();

                return response()->json([
                    'error' => 0
                ]);
            } else {
                newnumber:
                $std = new stdClass();
                $std->id = uniqid("pay_2checkout_");
                if (Cache::has($std->id))
                    goto newnumber;
                $std->itemid = $items->id;
                $std->userid = $user->id;


                Cache::put($std->id, $std, now()->addDays(30));
                if (!isset($items->json->idpay)) {
                    return response()->json([
                        'error' => 1,
                        'data' => ["no id pay"]

                    ], 400);
                }
                \Stripe\Stripe::setApiKey(env("stripe_payments_secret_test"));
                $newKeyForLooping = uniqid("ID_ITEM_");
                Cache::put($newKeyForLooping, [Auth::user()->id, $items->id], now()->addDays(15));
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $items->name,

                            ],
                            'unit_amount' => $items->cost * 100,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => URL::to('showallprojects'),
                    'cancel_url' => URL::to('/home'),
                    'customer_email' => Auth::user()->email,
                    'client_reference_id' => $newKeyForLooping
                ]);

                return response()->json([
                    'error' => 2,
                    'data' => ["id2checkout" => $items->json->idpay, "ref" => $std->id, "sessionId" => $session->id]
                ]);
            }
        } else {
            return response()->json([
                'error' => 1,
                'data' => $validator->errors()
                    ->all()
            ], 400);
        }
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function Invoices(Request $request)
    {
        $invs =     Invoices::where("users_id", AuthAuth::id())->get();
        foreach ($invs  as $inv) {
            $inv->items = InvoicesItems::where("invoices_id", $inv->id)->get();
            $inv->items[0]->item =  Items::where("id", $inv->items[0]->items_id)->first();
        }

        return view("UserControl.Users.Invoices")
            ->with(
                "itemsInvoice",
                $invs

            );
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function CheckOut(Request $request)
    {
        Twocheckout::username('testlibraryapi901248204');
        Twocheckout::password('testlibraryapi901248204PASS');


        $params = array(
            'sid' => '1817037',
            'mode' => '2CO',
            'li_0_name' => 'Test Product',
            'li_0_price' => '0.01'
        );
        Twocheckout_Charge::form($params, 'auto');
    }
}
