<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/dashboard/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        return redirect('/login');
    }

    public function login(Request $request)
    {
        try 
        {
            $username = $request->username;
            $password = $request->password;
            $remember_me = $request->has('remember_me') ? true : false;
            
            if (Auth::attempt(['username' => $username, 'password' => $password], $remember_me)) {
                $user = Auth::user();
                // if has a remember token
                if($request->remember_token) {
                    $user->remember_token = Str::random(60);
                }
                $user->api_token = Str::random(60);
                $user->save();
                return ['text' => 'Login successful', 'color' => 'success', 'api_token' => $user->api_token];
            } else {
                return response(['text' => 'Username/Password is incorrect', 'color' => 'error']);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response(['text' => 'Internal error', 'color' => 'error']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}