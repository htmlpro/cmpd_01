<?php

namespace App\Console\Commands;

use App\Notifications\ExpiredPasswordUsers;
use Illuminate\Console\Command;
use App\User;

class SendPasswordExpiryEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiredpasswordmail:expiredpassword';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will send an email to the users whose password expiry date is to be reached';

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
        $users = User::with('passwordSecurity')->get();
        // print_r($users); die;
        $users->notify(new ExpiredPasswordUsers( $users ));
    }
}
