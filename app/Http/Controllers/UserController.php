<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Role;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('users.index',['users'=>$users]);
    }
    public function show(User $user){


       return view('users.profile',['user'=>$user,'roles'=>Role::all()]);
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username'=> ['required','string','max:255','alpha_dash'],
            'name'=>['required','string','max:255'],
            'email' => ['required','email','max:255'],
            // 'password'=>['min:3','max:255','confirmed'],
            'avatar'=>['file'],
        ]);

        if(request('avatar')){
           $inputs['avatar'] = request('avatar')->store('images');
        }
        $user->update($inputs);

        return back();
    }
    public function destroy(User $user){
        $user->delete();

        session::flash('message','User was deleted');
        return back();
    }

    public function attach(User $user){
        //role id
        // dd(request('role'));

        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();
    }
}
