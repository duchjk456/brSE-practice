<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Admin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home(Request $request)
    {

        if (Session::has('token-admin') || Session::has('token-superadmin')) 
        {
            return view('home');
        } else {
            return view('login');
        }
    }

    public function login(LoginRequest $request)
    {
        $user = $request->only('email', 'password');
        $token = hash('sha256', Str::random(40));
        if ($request->email == env('SUPER_ADMIN_EMAIL') && $request->password == env('SUPER_ADMIN_PASSWORD')) {
            Session::put('token-superadmin', $token);
            return redirect('/home');
        } elseif (auth()->attempt($user)) {
            dd(1);
            Session::put('token-admin', $token);
            return view('home');
        } else {
            return redirect('/')->with('error','Sai pass email');
        }
    }

    public function logout() 
    {
        if (Session::has('token-admin')) {
            Session::forget('token-admin');
        }
        if (Session::has('token-superadmin')) {
            Session::forget('token-superadmin');
        }
        return redirect('/');
    }
}