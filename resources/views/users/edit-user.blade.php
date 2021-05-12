{{-- <x-admin-master>
    @section('content')
        <h1>User Profile for : {{$user->name}}</h1>
        <!----- Refactor niya del naa pay mga code na wala na update errors are not complete --->

        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('user.profile.update',$user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
    
                    <div class="mb-4">
                        <img width="100px"class="img-profile rounded-circle" src="{{$user->avatar}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="{{$user->username}}" class="form-control @error('username') is-invalid @enderror">
    
                        @error('username')
                             <div class="invalid-feedback">{{$message}} </div> 
                        @enderror
    
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{$user->name}}"class="form-control">
    
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control" placeholder="">
    
    
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="">
    
                     
                    </div>
    
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" placeholder="">
    
                      
                    </div>
    
                    <button type="submit" class="btn btn-primary">Submit</button>
    
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>✓</th>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Attach</th>
                              <th>Detach</th>
                       
                            
            
                          
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>✓</th>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Attach</th>
                              <th>Detach</th>  
                            </tr>
                          </tfoot>
                          <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td><input type="checkbox"
                                    @foreach($user->roles as $user_role)
                                        @if($user_role->slug == $role->slug)
                                            checked
                                        @endif
                                    @endforeach
                                    ></td>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    <form method="post" action="{{route('user.role.attach',$role->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary">Attach</button>
                                    </form>
                                </td>
                                    
                                    
                                    
                                    
                                <td><button class="btn btn-danger">Detach</button></td>
                            </tr>

                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
     
    @endsection
</x-admin-master> --}}