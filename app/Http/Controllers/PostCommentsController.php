<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;



class PostCommentsController extends Controller
{
    //
    public function index(){
        return view('admin.comments.index');
    }

    public function store(Request $request){
        $user = Auth::user();
     dd($user->avatar);
    //     $data = [
    //         'post_id' => $request->post_id,
    //         'author'=>$user->name,
    //         'email' => $user->email,
    //         // 'photo'=>$user->avatar,
    //         'body'=>$request->body
    //     ];

    //     Comment::create($data);

    //     $request->session()->flash('comment_message', 'Your message has been submitted and is waiting for approval');
        
    //     return back();
    }
}
