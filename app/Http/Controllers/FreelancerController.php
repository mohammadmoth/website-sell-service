<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Auth as AuthAuth;
use App\Invoices;
use App\InvoicesItems;
use App\Items;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

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
                    'project' => 'required|exists:projects,id'
                ]
            );

            if ($validator->passes()) {

                if (Project::where("id", $request->project)->first()->freelancer_id != AuthAuth::id()) {

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
                "data" => ["line: " . $th->getLine() . ", type: '" . $th->getMessage() . "'"]

            ], 400);
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
            return view("UserControl.Freelancer.InvoiceSystem.itemInvoices")->with("Invoices", $Invoices);
        } else {
            return redirect("/404");
        }
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function AskMoneyFreel(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'moeny' => 'required|numeric',

            ]
        );

        if ($validator->passes()) {
            $user = User::where("id", AuthAuth::id())->first();
            if ($request->moeny <= $user->money  - $user->moneyspins) {
                $items  =   Items::GetMyMoneyItem();
                $user->moneyspins += $request->moeny;

                $Invoices = new Invoices(); //   "users_id", 'deceptions', 'cost'
                $Invoices->users_id = $user->id;
                $Invoices->deceptions = $items->deceptions;
                $Invoices->cost = $request->moeny;
                $Invoices->save();

                $InvoicesItems = new InvoicesItems(); //   "invoices_id", 'cost', 'items_id', "count", "deceptions"
                $InvoicesItems->invoices_id   = $Invoices->id;
                $InvoicesItems->cost = $request->moeny;
                $InvoicesItems->items_id = $items->id;
                $InvoicesItems->count = 1;
                $InvoicesItems->deceptions = $items->deceptions;
                $InvoicesItems->save();


                $user->save();

                return response()->json([
                    'error' => 0,
                    'data' => [""]

                ]);
            } else
                return response()->json([
                    'error' => 1,
                    'data' => ["You Do't Have money, you have : " . (AuthAuth::user()->money  - AuthAuth::user()->moneyspins)]

                ], 400);
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
    public function InvoicesFree(Request $request)
    {
        $invs =     Invoices::where("users_id", AuthAuth::id())->get();
        foreach ($invs  as $inv) {
            $inv->items = InvoicesItems::where("invoices_id", $inv->id)->get();
            $inv->items[0]->item =  Items::where("id", $inv->items[0]->items_id)->first();
        }

        return view("UserControl.Freelancer.Invoices")
            ->with(
                "itemsInvoice",
                $invs
            );
    }
    /**
     * View page add money
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewGetMoneyFree(Request $request)
    {

        $money = $request->money;
        if (!is_numeric($money))
            $money = 100;


        return view("UserControl.Freelancer.InvoiceSystem.GetMoney")->with("money", $money);
    }
}
