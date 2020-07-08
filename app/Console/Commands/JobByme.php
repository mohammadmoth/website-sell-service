<?php

namespace App\Console\Commands;

use App\Jobs\AddProjectAndInvoice;
use App\Jobs\SendEmailsJob;
use Illuminate\Console\Command;


class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RunJobAddProject {Hash}';

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
        AddProjectAndInvoice::dispatch($this->argument('Hash'));

        //msf



        //
    }
}
