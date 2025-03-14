<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo()
    {
        if (Auth::user()->role == 'Artiste') {
            return route('user.dashboard');
        }
        if (Auth::user()->role == 'Auditeur') {
            return route('user.dashboard');
        }
        if (Auth::user()->role == 'Adm') {
            return route('admin.dashboard');
        }
        return $this->redirectTo; // or any route you want.
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))){
            $credentials = ['telephone'=>$request->get('email'),'password'=>$request->get('password')];
            $credentials['valide']="oui";
            return $credentials;
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->get('email'), 'password'=>$request->get('password')];
            $credentials['valide']="oui";
            return $credentials;
        }
        return ['username' => $request->get('email'), 'password'=>$request->get('password')];
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
