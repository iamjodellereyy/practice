<x-admin-master>

    @section('content')
        <h1>Edit a Post</h1>

        <div class="col-md-6">
            <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div><img height="50px"src="{{$post->post_image}}"> </div>
                    <label for="title">Post Image</label><br>
                    <input type="file" name="post_image" id="" value="{{$post->post_image}}"  aria-describedby="">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" aria-describedby="">
                </div>
                <div class="form-group">
                   <textarea name="body" placeholder="Content" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>      

            
    @endsection
</x-admin-master>