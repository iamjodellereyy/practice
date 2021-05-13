<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;



class PostCommentsController extends Controller
{
    //
    public function index(){
   
        $comments = Comment::all();
        // $post = Post::all();
        return view('admin.comments.index',['comments'=>$comments]);
    }

    public function store(Request $request){
        $user = Auth::user();
       
        $data = [
            'post_id' => $request->post_id,
            'author'=>$user->name,
            'email' =>$user->email,
            'body'=>$request->body
        ];

        Comment::create($data);

        $request->session()->flash('comment_message', 'Your message has been submitted and is waiting for approval');
        
        return back();
    }

    public function update(Request $request,$id){
        Comment::findOrFail($id)->update($request->all());
        $request->session()->flash('activation_message', 'Updated comment activation');
        
        return back();
    }

    public function destroy(Comment $comment){
        $comment->delete();

        //accessing a temporary session
        Session::flash('message','Comment was deleted');
        return back();
    }
}
