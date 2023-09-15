<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Group;
use App\Models\Owner;
use App\Models\Store;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function home(Request $request)
    {

        if (Session::has('token-admin') || Session::has('token-superadmin')) 
        {
            $admins = Admin::all();
            return view('home', ['admins' => $admins]);
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

    public function showFormCreatAdmin()
    {
        $groups = Group::all();
        return view('create-admin', ['groups' => $groups]);
    }

    public function createAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->group_id = $request->group_id;
        $admin->status = 1;
        $admin->save();
        return redirect('/admin-creat')->with('success','アカウント作成出来ました。');
    }

    public function blockAdmin (Request $request) {
        $admin = Admin::find($request->id);
        $admin->status = 0;
        $admin->save();
        return redirect('/home');
    }

    public function unBlockAdmin (Request $request) {
        $admin = Admin::find($request->id);
        $admin->status = 1;
        $admin->save();
        return redirect('/home');
    }

    public function editAdmin(Request $request)
    {
        $groups = Group::all();
        $admin = Admin::find($request->id);
        return view('edit-admin', ['groups' => $groups, 'admin' => $admin]);
    }

    public function updateAdmin(Request $request)
    {
        $admin = Admin::find($request->id);
        $admin->group_id = $request->group_id;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        $groups = Group::all();
        return redirect('/home',)->with('success','アカウント更新出来ました。');
    }

    public function getListOwners()
    {
        $owners = Owner::all();
        return view('list-owners', ['owners' => $owners]);
    }

    public function showFormCreatOwner()
    {
        $stores = Store::all();
        return view('create-owner', ['stores' => $stores]);
    }

    public function createOwner(Request $request)
    {
        $owner = new Owner();
        $owner->email = $request->email;
        $owner->name = $request->name;
        $owner->password = Hash::make($request->password);
        $owner->store_id = $request->store_id;
        $owner->status = 1;
        $owner->save();
        return redirect('/owner-creat')->with('success','アカウント作成出来ました。');
    }

    public function blockOwner (Request $request) {
        $owner = Owner::find($request->id);
        $owner->status = 0;
        $owner->save();
        return redirect('/list-owners');
    }

    public function unBlockOwner (Request $request) {
        $owner = Owner::find($request->id);
        $owner->status = 1;
        $owner->save();
        return redirect('/list-owners');
    }

    public function editOwner(Request $request)
    {
        $stores = Store::all();
        $owner = Owner::find($request->id);
        return view('edit-owner', ['stores' => $stores, 'owner' => $owner]);
    }

    public function updateOwner(Request $request)
    {
        $owner = Owner::find($request->id);
        $owner->store_id = $request->store_id;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();
        $stores = Store::all();
        return redirect('/list-owners',)->with('success','アカウント更新出来ました。');
    }
}