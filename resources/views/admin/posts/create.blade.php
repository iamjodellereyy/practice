<x-admin-master>

    @section('content')

        <h1>Create</h1>

        <x-tinyeditor></x-tinyeditor>
        <div class="col-md-6">
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Post Image</label><br>
                    <input type="file" name="post_image" id=""  aria-describedby="">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"  aria-describedby="">
                </div>
                <div class="form-group">
                   <textarea name="body" placeholder="Content" class="form-control" id="mytextarea" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>      

            
    @endsection
</x-admin-master>