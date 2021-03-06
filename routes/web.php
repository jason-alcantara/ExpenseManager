<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function() {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    Route::get('/roles', 'AdminController@roles')->name('roles');
    Route::post('/roles/addRole', 'AdminController@addRole')->name('addRole');
    Route::post('/roles/updateRole', 'AdminController@updateRole')->name('updateRole');
    Route::post('/roles/deleteRole', 'AdminController@deleteRole')->name('deleteRole');

    Route::get('/users', 'AdminController@users')->name('users');
    Route::post('/users/addUser', 'AdminController@addUser')->name('addUser');
    Route::post('/roles/updateUser', 'AdminController@updateUser')->name('updateUser');
    Route::post('/roles/deleteUser', 'AdminController@deleteUser')->name('deleteUser');

    Route::get('/categories', 'AdminController@category')->name('categories');
    Route::post('/categories/addCategory', 'AdminController@addCategory')->name('addCategory');
    Route::post('/roles/updateCategory', 'AdminController@updateCategory')->name('updateCategory');
    Route::post('/roles/deleteCategory', 'AdminController@deleteCategory')->name('deleteCategory');

    Route::get('/expenses', 'AdminController@expenses')->name('expenses');
    Route::post('/expenses/addExpense', 'AdminController@addExpense')->name('addExpense');
    Route::post('/roles/updateExpense', 'AdminController@updateExpense')->name('updateExpense');
    Route::post('/roles/deleteExpense', 'AdminController@deleteExpense')->name('deleteExpense');

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'AdminController@logout');
