<x-admin-master>
    @section('content')
     <h1>Role</h1>
      <div class="row">
          <div class="col-sm-3">

            @if(session('message'))
             <div class="alert alert-danger">{{session('message')}}</div>  
            @endif
              <form action="{{route('roles.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                        
                        @error('name')
                             <div class="invalid-feedback">{{$message}} </div> 
                        @enderror
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Create Role</button>
              </form>
          </div>

          <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                           
                        </tr>
                      </tfoot>
                      <tbody>
                          @foreach ($roles as $role)
                              <tr>
                                  <td>{{$role->id}}</td>
                                  <td><a href="{{route('roles.edit',$role->id)}}">{{$role->name}}</a></td>
                                  <td>{{$role->slug}}</td>

                                  <td>
                                      <form method="post" action="{{route('roles.destroy',$role->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger" type="submit">Delete</button>
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
      </div>
    @endsection
</x-admin-master>