<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function roles()
    {
        $roles = Role::all();
        return view('admin.user.roles', ['roles' => $roles]);
    }

    public function addRole(Request $request)
    {
        $this->validate($request,[
            'displayName' => 'required',
            'description' => 'required',
        ]);

        $role = new Role;

        $role->name = $request->input('displayName');
        $role->description = $request->input('description');

        $role->save();

        return redirect()->back();

    }

    public function users()
    {
        return view('admin.user.users');
    }
}
