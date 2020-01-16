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
    return view('layouts.login');
});

Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/roles', 'AdminController@roles')->name('roles');
Route::post('/roles/addRole', 'AdminController@addRole')->name('addRole');

Route::get('/users', 'AdminController@users')->name('users');
Route::post('/users/addUser', 'AdminController@addUser')->name('addUser');

Route::get('/categories', 'AdminController@category')->name('categories');
Route::post('/categories/addCategory', 'AdminController@addCategory')->name('addCategory');

Route::get('/expenses', 'AdminController@expenses')->name('expenses');
Route::post('/expenses/addExpense', 'AdminController@addExpense')->name('addExpense');