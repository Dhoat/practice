@extends('layouts.app')
@section('content')
<h1>Add Categories</h1>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="col-lg-12">
               <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                  <div class="card-body">
                                <div class="form-group" >
                                    <label>name</label>
                                    <input type="text" required name="name" class="form-control"
                                        value="" required>
                                </div>
                                
                            <div class="form-group">
                                <label for="parent">Parent Category:</label>
                                <select name="parent" id="parent" class="form-control">
                                    <option value="">No Parent</option>
                                     @foreach($categorie as $categori))
                                       <option value="{{$categori->id}}">{{$categori->name}}</option>
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