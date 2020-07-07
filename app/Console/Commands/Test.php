<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailsJob;
use Illuminate\Console\Command;


class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * mhd@othman.info
     * @return mixed
     */
    public function handle()
    {
        $details = [
            'email' => 'mohmmad.m.othman@gmail.com',
            "data" => ["errors" => "The pay Not working", "code" => "222"],
            "view" => "Error",
            "subject"=>"error Test"
        ];
        $details = [
           // 'email' => $user->email,
           'email' => 'mohmmad.m.othman@gmail.com',
           "data" => ["Moeny" => "300"],
            "view" => "MoneyPending",
            "subject" => "Payment Confirmed"
        ];
        SendEmailsJob::dispatch($details);

        //msf



        //
    }
}
