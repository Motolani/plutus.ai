<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    //for multiusers login
    protected function redirectTo()
    {

        if (Auth()->user()->role == 1) {
            return route('admin.dashboard');
        } elseif (Auth()->user()->role == 2) {
            return route('enterprise.dashboard');
        } elseif (Auth()->user()->role == 3) {
            return route('freelancer.dashboard');
        } elseif (Auth()->user()->role == 4) {
            return route('starter.dashboard');
        } elseif (Auth()->user()->role == 5) {
            return route('employee.dashboard');
        }
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

    //overriding laravels login cause of multiuser
    // public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->role == 1) {
    //             return redirect()->route('admin.dashboard');
    //         } elseif (auth()->user()->role == 2) {
    //             return redirect()->route('enterprise.dashboard');
    //         } elseif (auth()->user()->role == 3) {
    //             return redirect()->route('freelancer.dashboard');
    //         } elseif (auth()->user()->role == 4) {
    //             return redirect()->route('starter.dashboard');
    //         }
    //     } else {
    //         return redirect()->route('login')->with('error', 'Email and password are wrong');
    //     }
    // }
}
