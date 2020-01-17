<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Category;
use App\User;
use App\Expense;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $expenses = Expense::where('user_id', Auth::user()->id)->get()
                                        ->groupBy('category_id');
        return view('admin.dashboard', ['expenses' => $expenses]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
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

    public function updateRole(Request $request)
    {
        $this->validate($request,[
            'updateName' => 'required',
            'updateDesc' => 'required',
        ]);

        $role = Role::where('id', $request->input('roleId'))->first();

        $role->name = $request->input('updateName');
        $role->description = $request->input('updateDesc');

        $role->save();

        return redirect()->back();
    }

    public function deleteRole(Request $request)
    {
        $role = Role::where('id', $request->input('roleId'))->first();

        $role->delete();

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

    public function updateUser(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'roleSelect' => 'required',
        ]);

        $role = Role::where('name', $request->input('roleSelect'))->first();
        
        $user = User::where('id', $request->input('userId'))->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $role->id;

        $user->save();

        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = User::where('id', $request->input('userId'))->first();

        $user->delete();

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

    public function updateCategory(Request $request)
    {
        $this->validate($request,[
            'displayName' => 'required',
            'description' => 'required',
        ]);

        $category = Category::where('id', $request->input('categoryId'))->first();

        $category->name = $request->input('displayName');
        $category->description = $request->input('description');

        $category->save();

        return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::where('id', $request->input('categoryId'))->first();

        $category->delete();

        return redirect()->back();
    }

    public function expenses()
    {
        $categories = Category::all();
        $expenses = Expense::where('user_id', Auth::user()->id)->get();
        return view('admin.expense.expenses', ['categories' => $categories,
                                               'expenses'   => $expenses ]);
    }

    public function addExpense(Request $request)
    {
        $this->validate($request,[
            'category'  => 'required',
            'amount'    => 'required',
            'entry'     => 'required',
        ]);

        $category = \App\Category::where('name', $request->input('category'))->first();
        $user = Auth::user()->id;

        $expense = new Expense;

        $expense->user_id = $user;
        $expense->category_id = $category->id;
        $expense->amount = $request->input('amount');
        $expense->entry_date = $request->input('entry');

        $expense->save();

        return redirect()->back();

    }

    public function updateExpense(Request $request)
    {
        $this->validate($request,[
            'category'  => 'required',
            'amount'    => 'required',
            'entry'     => 'required',
        ]);

        $category = Category::where('name', $request->input('category'))->first();

        $expense = Expense::where('id', $request->input('expenseId'))->first();

        $expense->category_id = $category->id;
        $expense->amount = $request->input('amount');
        $expense->entry_date = $request->input('entry');

        $expense->save();

        return redirect()->back();
    }

    public function deleteExpense(Request $request)
    {
        $expense = Expense::where('id', $request->input('expenseId'))->first();

        $expense->delete();

        return redirect()->back();
    }
}
