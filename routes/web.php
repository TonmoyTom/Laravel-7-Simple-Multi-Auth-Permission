<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin']], function () {
    Route::get('/home', 'AdminController@index')->name('admin.home');
    //Admin Profile...
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::get('/profile/change', 'AdminController@profilechange')->name('admin.profile.change');

    //Ajax Start
    Route::Post('/update-password', 'AdminController@oldPassword');
    //ajax End

    Route::post('/update-profile-change-store', 'AdminController@upadteprofilestore')->name('admin.update.profile.store');

    Route::get('/password/change', 'AdminController@passwordchange')->name('admin.password.change');
    Route::post('/password/change/store', 'AdminController@updatepassword')->name('admin.password.change.store');

    //All Admin ...

    Route::get('/allusers', 'AdminController@allusers')->name('users.all');
    Route::get('/create/users', 'AdminController@usercreate')->name('users.create');
    Route::Post('/create/users', 'AdminController@store')->name('users.store');;

    //Admin Edit System ...
    Route::get('/users/view/{id}', 'AdminController@view')->name(' users.view ');
    Route::get('/users/edit/{id}', 'AdminController@edit')->name(' users.edit ');
    Route::get('/users/message/{id}', 'AdminController@message')->name(' users.message ');
    Route::post('/users/message/', 'AdminController@messageupdate')->name(' users.messageUpdate');
    Route::Post('/users/edit/{id}', 'AdminController@update')->name(' users.update ');
    Route::post('/users/delete/{id}', 'AdminController@delete')->name('users.delete ');
    // Route::delete('/users/multiple/delete/{id}', 'AdminController@multipledelete')->name('users.multiple.delete ');

    //Role System

    Route::get('/allroles', 'RoleController@index')->name('role.all');
    Route::get('/create/roles', 'RoleController@create')->name('role.create');
    Route::post('/create/roles', 'RoleController@store')->name('role.store');

    //Role Edit System

    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('role.edit ');
    Route::post('/roles/edit/{id}', 'RoleController@update')->name('role.update ');
    Route::post('/roles/delete/{id}', 'RoleController@delete')->name('role.delete ');
});
