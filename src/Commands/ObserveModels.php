<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ObserveModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifing:observe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Notification Observer For The Models Provided In Notification Builder Config';

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
     *
     * @return mixed
     */
    public function handle()
    {
        
    }
}
