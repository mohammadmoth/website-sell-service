<?php

namespace App\Jobs;

use App\Invoices;
use App\InvoicesItems;
use App\Items;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmails;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class AddProjectAndInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $timeout = 20;
    protected $key;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if (Cache::has($this->key) ) {


            $data =   Cache::get($this->key);
            $user = User::where("id", $data->userid)->first();
            $items = Items::where("id", $data->itemid)->first();
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
            $user->moneyspins += $items->cost;
            $user->money += $items->cost;
            $project->save();
            $user->save();
            $details = [
                'email' => $user->email,
                "data" => ["projectname" => $items->name],
                "view" => "NewProjectAdded",
                "subject" => "Payment Confirmed"
            ];
            SendEmailsJob::dispatch($details);
        } else {

            ///error
        }
    }
}
