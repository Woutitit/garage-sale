<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return view('pages.auth.login');
    }

    public function login(Request $request) {

        // Validate input
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            ]);

        // Attempt login
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(array('email' => $email, 'password' => $password))){
            $path = User::where('email', $email)->value('path');
            Auth::user()->setAttribute('path', $path);
            return redirect()->intended(Auth::user()->path . '/items');
        }
        else {        
            return redirect()->intended('login');
        }

    }
}
