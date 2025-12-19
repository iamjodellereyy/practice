<x-admin-master>
    @section('content')




        @if (count($comments) > 0)
            <h1>Comments</h1>

            @if (session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @elseif(session('activation_message'))
                <div class="alert alert-success">{{ session('activation_message') }}</div>
            @endif


            <div class="row">
                <div class="col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Post ID</th>
                                            <th>Content</th>
                                            <th>Author</th>
                                            <th>Author Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Post ID</th>
                                            <th>Content</th>
                                            <th>Author</th>
                                            {{-- <th>Author Email</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->post_id }}</td>
                                                <td>{{ $comment->body }}</td>
                                                <td>{{ $comment->author }}</td>
                                                {{-- <td>{{$comment->email}}</td> --}}

                                                <td><a href="{{ route('post', $comment->post->slug) }}">View Post</a></td>

                                                <td>
                                                    @if ($comment->is_active == 1)
                                                        <form method="post"
                                                            action="{{ route('comments.update', $comment->id) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="is_active" value="0">
                                                            <button type="submit" class="btn btn-danger">Unapprove</button>
                                                        </form>
                                                    @else
                                                        <form method="post"
                                                            action="{{ route('comments.update', $comment->id) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="is_active" value="1">
                                                            <button type="submit" class="btn btn-primary">Approve</button>
                                                        </form>
                                                    @endif
                                                </td>


                                                <td>
                                                    <form method="post"
                                                        action="{{ route('comments.destroy', $comment->id) }}"
                                                        enctype="multipart/form-data">
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
                </div>
            </div>
        @else
            <h1 class="text-center">No Comments</h1>
        @endif
    @endsection
</x-admin-master>
