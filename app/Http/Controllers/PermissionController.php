<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class PermissionController extends Controller
{
    //
    public function index(){
        return view('admin.permissions.index',['permissions'=>Permission::all()]);
    }
    public function store(){
        request()->validate([
            'name'=>['required']
        ]);

        Permission::create(['name'=>Str::ucfirst(request('name')),'slug'=>Str::lower(request('name'))]);
        return back();
    }

    public function destroy(Permission $permission){
        $permission->delete();
        session::flash('message','Deleted Permission'. " " .$permission->name);
        return back();
    }

}
