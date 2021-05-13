<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentRepliesController extends Controller
{
    //
    public function index(){
        return view('admin.comments.replies.index');
    }
}
