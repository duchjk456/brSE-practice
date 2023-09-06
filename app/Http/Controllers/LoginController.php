<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home(Request $request)
    {
        // if (auth()->check()) {
        //     return view('home');
        // } else {
            return view('login');
        // }
    }

    public function adminLogin(Request $request)
    {
        // Session::forget('token');
        dd(1);
        // $user = $request->only('email', 'password');
        // if ($request->email == env('SUPER_ADMIN_EMAIL') && $request == env('SUPER_ADMIN_PASSSWORD')) {
        //     $token = hash('sha256', Str::random(40));
        //     Session::put('token', $token);
        //     dd($token);
        //     return view('home');
        // } elseif (auth()->attempt($user)) {
        //     return view('home');
        // } 
    }

    public function logout() 
    {
        Session::forget('token');
    }
}