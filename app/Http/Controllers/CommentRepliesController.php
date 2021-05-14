<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CommentReply;

class CommentRepliesController extends Controller
{
    //
    public function index(){
        return view('admin.comments.replies.index');
    }

    public function createReply(Request $request){
        $user = Auth::user();
       
        $data = [
            'comment_id' => $request->comment_id,
            'author'=>$user->name,
            'email' =>$user->email,
            'photo'=>$user->avatar,
            'body'=>$request->body
        ];

        CommentReply::create($data);

        $request->session()->flash('reply_message', 'Your reply has been submitted and is waiting for approval');
        
        return back();
    }
}
