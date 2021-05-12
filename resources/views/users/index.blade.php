<x-admin-master>
    @section('content')
        <h1>Users</h1>

        @if(session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>  

        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Registered on</th>
                      <th>Updated Profile Date</th>
                      <th>Action</th>
    
                  
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        
                      <th>Id</th>
                      <th>Username</th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Registered on</th>
                      <th>Updated Profile Date</th>
                      <th>Action</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($users as $user)

                      <tr>
                          <td>{{$user->id}}</td>
                          <td><a href="{{route('user.profile.show',$user->id)}}">{{$user->username}}</a></td>
                          <td>
                              <img height="40px" src="{{$user->avatar}}">
                          </td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at->diffForHumans()}}</td>
                          <td>{{$user->updated_at->diffForHumans()}}</td>

                          <td>
                            <form method="post" action="{{route('user.destroy',$user->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                         
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


    @endsection

          
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


    <!----- Update tonon pani del sa pagination ------>
    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}
</x-admin-master>