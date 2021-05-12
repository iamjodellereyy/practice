<x-admin-master>
   @section('content')
   <div class="row">
    <div class="col-sm-3">

      @if(session('role-update'))
       <div class="alert alert-danger">{{session('role-update')}}</div>  
      @endif
        <form action="{{route('roles.update',$roles->id)}}" method="post">
          @csrf
          @method('PUT')
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" value="{{$roles->name}}" class="form-control @error('name') is-invalid @enderror">

                  
                  @error('name')
                       <div class="invalid-feedback">{{$message}} </div> 
                  @enderror
              </div>

              <button class="btn btn-primary btn-block" type="submit">Update Role</button>
        </form>
 
     </div>
   </div>
   <br>

    <div class="row">
        <div class="col-lg-12">
            @if($permissions->isNotEmpty())
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Check</th>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Attach</th>
                              <th>Detach</th>
                             
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>Check</th>
                               <th>Id</th>
                               <th>Name</th>
                               <th>Slug</th>
                               <th>Attach</th>
                               <th>Detach</th>
                                
                            </tr>
                          </tfoot>
                          <tbody>
                             @foreach($permissions as $permission)
                                <tr>
                                    <td><input type="checkbox"
                                        @foreach($roles->permissions as $permission_role)
                                            @if($permission_role->slug == $permission->slug)
                                                checked
                                            @endif
                                        @endforeach
                                        ></td>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->slug}}</td>

                                
                                      <td>
                                        <form method="post" action="{{route('role.permission.attach',$roles)}}">
                                        @csrf
                                        @method('PUT')
    
                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                        <button class="btn btn-primary" 
                                        @if($roles->permissions->contains($permission))
                                        disabled
                                        @endif>Attach</button>
                                        </form>
                                     </td>

                                     
                                     <td>
                                      <form method="post" action="{{route('role.permission.detach',$roles)}}">
                                      @csrf
                                      @method('PUT')
  
                                      <input type="hidden" name="permission" value="{{$permission->id}}">
                                      <button class="btn btn-danger" 
                                      @if(!$roles->permissions->contains($permission))
                                      disabled
                                      @endif>Detach</button>
                                      </form>
                                   </td>
                                        
                                  
                                </tr>
                             @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            @endif
        </div>
    </div>


   @endsection
</x-admin-master>