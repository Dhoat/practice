@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-footer">
                <h1 class="tile-title">User Management</h1>
                <a href="{{ route('create') }}" class="btn btn-primary" id="">Add</a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" id="">Edit</a>
                                 @if(Auth::check())
                                    @php
                                        $role = Auth()->user()->role;
                                        if( Auth()->user()->id != $user->id){
                                    @endphp
                                            <a class="btn btn-danger delete-button" data-url="{{ route('delete.destroy', $user->id) }}">Delete</a>
                                    @php
                                        }
                                    @endphp
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                  {{  $users->links() }}
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-button').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the delete operation here
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(() => {
                        // Redirect or perform any other action after deletion
                        window.location.href = url;
                    });
                }
            });
        });
    });
</script>

@endsection
