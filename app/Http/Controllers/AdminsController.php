<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;

class AdminsController extends Controller
{
    //
    public function index(){

        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $usersCount = User::count();


        return view('admin.index',['postsCount'=>$postsCount,'commentsCount'=>$commentsCount,'usersCount'=>$usersCount]);
    }
}
