<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;
use Mail;
class ResetPasswordMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resetpassword:mail';

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
        $users = User::with('passwordSecurity')->get()->toArray();

        foreach( $users as $user)
        {  
            if( strtotime($user['password_security']['password_updated_at']) > strtotime('2020-05-05 07:15:27') )
            {   
                    $mailid = 'getrandheer@gmail.com';
                    $subject = 'Reset your password.';
                    $data = array('email' => $mailid, 'subject' => $subject);
                    Mail::send('emails.resetpassword', $data, function ($message) use ($data) {
                    $message->from('expertsphp@gmail.com', 'News Information');
                    $message->to($data['email']);
                    $message->subject($data['subject']); 
                });
                if (Mail::failures()) {
                   return response()->Fail('Sorry! Please try again latter');
                 }else{
                   return response()->success('Great! Successfully send in your mail');
                 }
            }
        }

              
    }
}
