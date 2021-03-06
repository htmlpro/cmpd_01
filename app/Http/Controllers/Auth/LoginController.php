<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        $request->session()->forget('password_expired_id');

        $password_updated_at = $user->passwordSecurity->password_updated_at;
        $password_expiry_days = $user->passwordSecurity->password_expiry_days;
        $password_expiry_at = Carbon::parse($password_updated_at)->addDays($password_expiry_days);
        if($password_expiry_at->lessThan(Carbon::now())){
            $request->session()->put('password_expired_id',$user->id);
            auth()->logout();

        // Mail::send('emails.expired_password', ['user' => $user], function ($m) use ($user) {
        //     $m->from('thousandoakspharmacy@gmail.com', 'ThousandOaks Halthcare');

        //     $m->to($user->email, $user->name)->subject('Your password has been expired! Please update it.');
        // });

            return redirect('/passwordExpiration')->with('message', "Your Password is expired, You need to change your password.");
        }

        return redirect()->intended($this->redirectPath());
    }
}
