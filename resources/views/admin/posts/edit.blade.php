@extends('layouts.app')
@section('content')

<h2>UPDATE POST</h2>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="container">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control ckeditor" id="content" name="content">{{ $post->content }}</textarea>
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
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ $post->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $post->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" id="profile_image" onchange="loadPreview(this);" class="form-control">
            <label for="profile_image"></label>
            <img id="preview_img" src="/storage/image/{{ $post->image }}" width="200" height="150" />
        </div>

        <button  name="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id).attr('src', e.target.result).width(200).height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
