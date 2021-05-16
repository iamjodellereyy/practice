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

      <div class="media mb-4">
        <img weight="50px" height="50px" class="d-flex mr-3 rounded-circle" src="{{$comment->photo}}" alt="">
        <div class="media-body">
          <h5 class="mt-0">{{$comment->author}}
            <small>{{$comment->created_at->diffForHumans()}}</small>
          </h5>
          <p>{{$comment->body}}</p>
        </div>
      </div>


      @endforeach

    @endsection

    
</x-master>