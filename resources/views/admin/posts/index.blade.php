<x-admin-master>
    @section('content')

    <h1>All Posts</h1>

    @if(session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>  
     @elseif(session('post-create-message'))
      <div class="alert alert-success">{{session('post-create-message')}}</div>  
     @elseif(session('post-update-message'))
      <div class="alert alert-success">{{session('post-update-message')}}</div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>View Post</th>
                  <th>View Comments</th>
                  <th>Action</th>

              
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>View Post</th>
                  <th>View Comments</th>
                  <th>Action</th>
                  
                </tr>
              </tfoot>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->user->name}}</td>
                  <td><a href="{{route('post.edit',$post->slug)}}">{{$post->title}}</a></td>
                  <td>
                    <img height="50px" src="{{asset($post->post_image)}}">
                  </td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>

                  <td><a href="{{route('post',$post->slug)}}">View Post</a></td>
                  <td><a href="{{route('post.comment',$post->id)}}">View Comments </a></td>
                            
                  <td>

                    {{-- @can('view',$post) --}}
                    <form method="post" action="{{route('post.destroy',$post->slug)}}" enctype="multipart/form-data">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    {{-- @endcan --}}
                    
                  </td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

{{--       Pagination
      <div class="d-flex">
        <div class="mx-auto">
            {{$posts->links()}}
        </div>
      </div>
 --}}

    @endsection
    
    @section('scripts')
      
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>