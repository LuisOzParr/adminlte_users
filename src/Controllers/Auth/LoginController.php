<?php

namespace Ozparr\AdminlteUsers\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |---------------------------------  -----------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('adminlte::auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect($this->redirectLogout);
    }



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    protected $redirectLogout;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->redirectTo = config('loginoz.loginRedirec');
        $this->redirectLogout = config('loginoz.loginRedirecLogout');

        $this->middleware('guest')->except('logout');
    }
}
