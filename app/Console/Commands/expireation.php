<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class expireation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire'; // name 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire usersevery 5 minute automatically';// descrption 

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
      $users = User::where('expire',0)->get();

      foreach ( $users as $user) {
          
        $user ->update(['expire'=>1]);
      }

    }
}
