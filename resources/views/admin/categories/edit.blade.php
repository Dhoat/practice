@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="col-lg-12">
        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" required name="name" value="{{ $categorie->name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" value="{{ $categorie->slug }}" class="form-control" required>
                </div>
                <div class="form-group">
                                <label for="parent">Parent Category:</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="">No Parent</option>
                                     @foreach($categorie as $categori))
                                       <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                  @endforeach                             
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
