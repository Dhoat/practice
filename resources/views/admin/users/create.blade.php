@extends('layouts.app')
@section('content')
<h1>Add User</h1>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<div class="col-lg-12">
               <form method="POST" action="{{ route('users.store') }}">
                @csrf
                  <div class="card-body">
                                <div class="form-group" >
                                    <label>Username</label>
                                    <input type="text" required name="name" class="form-control"
                                        value="" required>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" required name="email" class="form-control"
                                        value="" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
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
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" required name="password" class="form-control" value=""
                                        required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button  name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
</div>
@endsection