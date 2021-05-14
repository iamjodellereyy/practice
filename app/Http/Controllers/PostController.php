<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Role;


class PostController extends Controller
{
 
    public function index(){

        //other way of avoiding the user to hilabot sa lain nga post
        $posts = auth()->user()->posts;

        // $user = new User();
        // $user->userHasRole('admin') ? $posts = Post::all() : $posts = auth()->user()->posts;
        // //displaying pagination 
        // // $posts = auth()->user()->posts()->paginate(5);

        
        return view('admin.posts.index',['posts'=>$posts]);
    }
    public function show(Post $post){
        // $post = Post::findOrFail($id);
        // $comment = $post->comments->whereIsActive(1)->get();

         $comment = $post->comments()->where('is_active', 1)->get();
        return view('blog-post',['post'=>$post,'comments'=>$comment]);
    }
    
    public function create(){
        return view('admin.posts.create');
    }
    
    public function store(){

        $this->authorize('create',Post::class);

       $inputs = request()->validate([
            'title'=>'required|min:5|max:50',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        
        //checking if post_image that is coming from the request exists
        //post_image is in the form 
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
    
        //the problem is dili siya ma sud sa database. Why?
        //walay request sa if na condition
        //content ang nabutang nako sa name sa form 
        auth()->user()->posts()->create($inputs);

        session()->flash('post-create-message','Post was created');

        return redirect()->route('post.index');
  
    } 

    //route model binding
    public function edit(Post $post){
        // $this->authorize('view',$post);

        // if(auth()->user()->can('view,$post'));

        return view('admin.posts.edit',['post'=>$post]);
    }

    public function destroy(Post $post){
        $post->delete();

        //accessing a temporary session

        Session::flash('message','Post was deleted');

        return back();
    }

    public function update(Post $post){

        //required man diay minimum of 5 
        //naamong ko sa min ug max nga require hahays
        //be more cautios next time del

        $inputs = request()->validate([
            'title'=>'required|min:5|max:250',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
            // $inputs['post_image'] = $post->post_image;
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        //a policy nga ma update ra niya ug authorize siya mo update check Policies\PostPolicy
        $this->authorize('update',$post);

        //this will save any user nga naka log in bisan dili iya nga post
        // auth()->user()->posts()->save($post);

        $post->save();
        session()->flash('post-update-message','Post was updated');
        return redirect()->route('post.index');
    }
}
