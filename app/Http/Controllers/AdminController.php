<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.user.roles');
    }

    public function users()
    {
        return view('admin.user.users');
    }
}
