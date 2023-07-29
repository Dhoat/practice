@extends('layouts.app')
@section('content')
 
<div class="container">
<div class="col-md-12">
          <div class="tile">
          	<div class="tile-footer">
                <h1 class="tile-title">Categorie</h1>
             <a href="{{ route('categories.create') }}" class="btn  btn-primary"  id="">Add</a> 
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>ACTION</th>
                  
                  </tr>
                </thead>
                <tbody>
                   @foreach($categorie as $categori)
                   <tr>
                          <td>{{$categori->id}}</td>
                          <td>{{$categori->name}}</td>
                          <td>{{$categori->slug}}</td>
                          <td>
                                <a href="{{ route('categories.edit', $categori->id) }}" class="btn btn-primary"  id="">Edit</a> 
                                <a class="btn btn-danger delete-button" data-url="{{ route('delete.categorie', $categori->id) }}">Delete</a>
                          </td>
                    </tr>
                     @endforeach  
                    
                         
                </tbody>
              </table>
              {{ $categorie->links() }}
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