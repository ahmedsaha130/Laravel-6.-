<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notfiy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notfiy:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email notify for all user every day ';

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
        // $user = User::select('email')->get();
        $emails = User::pluck('email')->toArray();
        $data = ['titel'=>'programming','body'=>'php'];

        
        foreach ($emails as $email) {
            
            // How to send Email in laravel 

            Mail::To($email)->send(new NotifyEmail($data));
        }
        
    }
}
