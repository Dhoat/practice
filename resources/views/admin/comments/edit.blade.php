@extends('layouts.app')

@section('content')
    <h1>Edit Comment</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="col-lg-12">
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="card-body">
                                <div class="form-group" >
                                    <label>Comments</label>
                                    <textarea name="comment" class="form-control ckeditor" ></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="Post">Post</label>
                                    <select id="post" name="post_id" class="form-control" required>
                                        <option value="">Select a Post</option>
                                        @foreach($posts as $post)
                                            <option value="{{ $post->id }}">{!! $post->title !!}</option>
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
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button  name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
    </div>

 @endsection