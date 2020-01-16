<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Category;
use App\User;
use App\Expense;

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
        $roles = Role::all();
        $users = User::all();
        return view('admin.user.users', ['roles' => $roles,'users' => $users]);
    }

    public function addUser(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roleSelect' => 'required',
        ]);

        $role = \App\Role::where('name', $request->input('roleSelect'))->first();

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $role->id;

        $user->save();

        return redirect()->back();
    }

    public function category()
    {
        $categories = Category::all();
        return view('admin.expense.categories', ['categories' => $categories]);
    }

    public function addCategory(Request $request)
    {
        $this->validate($request,[
            'displayName' => 'required',
            'description' => 'required',
        ]);

        $category = new Category;

        $category->name = $request->input('displayName');
        $category->description = $request->input('description');

        $category->save();

        return redirect()->back();

    }

    public function expenses()
    {
        $categories = Category::all();
        return view('admin.expense.expenses', ['categories' => $categories]);
    }

    public function addExpense(Request $request)
    {
        $this->validate($request,[
            'category'  => 'required',
            'amount'    => 'required',
            'entry'     => 'required',
        ]);

        $category = \App\Category::where('name', $request->input('category'))->first();

        $expense = new Expense;

        return redirect()->back();

    }
}
