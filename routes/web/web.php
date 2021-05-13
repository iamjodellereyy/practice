<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facedes\Routemiddleware;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login',function(){
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::middleware('auth')->group(function(){

    Route::get('/admin', 'AdminsController@index')->name('admin.index');
    Route::get('/post{post}','PostController@show')->name('post');
    
});

//make the that the admin is same as the name 
Route::middleware('role:Admin','auth')->group(function(){
    Route::get('/users','UserController@index')->name('users.index');
    Route::put('/users/{user}/attach','UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach','UserController@detach')->name('user.role.detach');

    
    Route::get('/roles','RoleController@index')->name('roles.index');
    Route::post('/roles','RoleController@store')->name('roles.store');
    Route::delete('/roles/{role}','RoleController@destroy')->name('roles.destroy');
    Route::get('roles/edit/{role}','RoleController@edit')->name('roles.edit');
    Route::put('roles/{role}/update','RoleController@update')->name('roles.update');
    Route::put('/roles/{role}/attach','RoleController@attach_permission')->name('role.permission.attach');
    Route::put('/roles/{role}/detach','RoleController@detach_permission')->name('role.permission.detach');

    Route::get('/permissions','PermissionController@index')->name('permissions.index');
    Route::post('/permissions','PermissionController@store')->name('permissions.store');
    Route::delete('permissions/{permission}','PermissionController@destroy')->name('permissions.destroy');

    Route::get('/comments','PostCommentsController@index')->name('comments.index');
    Route::post('/comments/store','PostCommentsController@store')->name('comments.store');
    Route::get('/replies','CommentRepliesController@index')->name('replies.index');
});



