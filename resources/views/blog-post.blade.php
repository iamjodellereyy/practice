<x-master>

    @section('content')

      <!-- Title -->
      <h1 class="mt-4">{{$post->title}}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on {{$post->created_at->diffForHumans()}}</p>

      <hr>

      <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

      <hr>

      <!-- Post Content -->
      <p class="lead">{{$post->body}}</p>

  
      {{-- <blockquote class="blockquote">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer class="blockquote-footer">Someone famous in
          <cite title="Source Title">Source Title</cite>
        </footer>
      </blockquote> --}}
     
      <hr>

      @if(session('comment_message'))
        <div class="alert alert-success">{{session('comment_message')}}</div>  
      @endif

     
      <!-- Comments Form -->
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            
           
              <input type="hidden" name="post_id" value="{{$post->id}}">
        
            <div class="form-group">
              <textarea name="body" class="form-control" rows="3" placeholder="Content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>


      {{-- @if(count($comments) > 0) --}}
      @foreach($comments as $comment)
      <!-- Comment with nested comments -->
      <div class="media mb-4">
        <img height="50" width="50" class="d-flex mr-3 rounded-circle" src="{{$comment->photo}}" alt="">
        <div class="media-body">
          <h5 class="mt-0">{{$comment->author}}</h5>
          {{$comment->body}}

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            
            
              <form action="{{route('replies.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <div class="form-group col-sb-3" >
                  <input type="hidden" name="post_id" value="{{$post->id}}">
                </div> 
                <div class="form-group">
                  <textarea name="body" class="form-control" rows="1" placeholder="Content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            
            </div>



          </div>
        
        @endforeach
        {{-- @endif --}}

        </div>
      </div>

    @endsection

</x-master>