@extends('layouts.app')
@section('content')
<h1>Add Post</h1>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="col-lg-12">
               <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                  <div class="card-body">
                                <div class="form-group" >
                                    <label>Title</label>
                                    <input  name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control ckeditor "></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control" required>
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                     <input type="file" name="image" id="profile_image" onchange="loadPreview(this);" class="form-control">

                              <label for="profile_image"></label>
                                <img id="preview_img" src="" class="" width="200" height="150"/>
        
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
</div>

 @endsection

     <script>
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>