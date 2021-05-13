<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    //
    public function index(){
        return view('admin.comments.index');
    }
}
