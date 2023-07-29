@extends('layouts.app')


@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#productform">
  ADD Product
</button>
<div class="modal fade" id="productform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
     
            <form id="product" method="post"  enctype="multipart/form-data"  action_data ="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group validatename">
                    <label for="productname">Product Name</label>
                    <input type="text" class="form-control" id="productname" aria-describedby="productname"  name="name" placeholder="Enter Product name"> 
                    <span class="text-danger error-text  name_error" i></span>
                </div>
                <!-- <div class="form-group">
                    <label for="producttitle">Product Title</label>
                    <input type="text" class="form-control" id="producttitle" aria-describedby="producttitle" name="title"  placeholder="Enter Product title"> 
                    <span class="text-danger error-text  title_error" i></span>
                    </div> -->
                <div class="form-group">
                    <label for="productdescription">Product Description</label>
                    <input type="text" class="form-control" id="productdescription" aria-describedby="productdescription"  name="description" placeholder="Enter Product description"> 
                    <span class="text-danger error-text  description_error" i></span>
                    </div>
                <div class="form-group">
                        <label for="productname">Product Name</label>
                        <input type="file" class="form-control" id="productfile" aria-describedby="productfile"  name="image" placeholder="Enter Product file"> 
                        <span class="text-danger error-text  file_error" i></span>
                </div>
                <!-- <div class="form-group">
                        <label for="categorybane">Category Name</label>
                        <select name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                </div>
                 -->
                

                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>  
      </div>
     
    </div>
  </div>
</div>

<table class="table" id="dataTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th> 
      <th scope="col">Category</th>
   
    </tr>
  </thead>
    
 
  <tbody>
    <!-- @foreach($products as $product)
        <tr>
                <td>{{  $product->id }}</td>
                <td>{{  $product->name }}</td>
                <td>{{  $product->description }}</td>
                <td>{{  $product->category->name}}</td>
               
                <td>
                  <a  class="btn btn-primary" href="{{ route('products.show', $product->id)}}">show</a>
                <button type="button" class="btn btn-primary editProductBtn" data-remote="{{ route('products.edit', $product->id)}}" data-id='{{$product->id }}'>
                         Edit Product
                    </button>

                          
                       <form action="{{ route('products.destroy', $product->id)}}" method="post">
                           @method('delete')
                           @csrf
                           <button type="submit" name="delete" class="btn btn-large btn-danger deleteProduct">Delete</button>
                       </form><td>
        </tr>
    @endforeach -->

    
  </tbody>
</table>
<div class="container"> <div  class="pagination"> {!! $products->links() !!} </div></div>

<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                
            </div>

        </div>
    </div>
</div>                 

<script>


    jQuery(document).ready(function(){


//-------------open modal form-------///
      $('#productform').click(function () {
          $('#productform').modal('show');
          
         
  
        $('#product').validate({
          
            rules: { 
                name: "required",
               // title: "required",
                description: "required",
                category_id: "required",
            },  
            messages: {
                name: "Please enter your name",
               // title: "Please enter your Title",
                description: "Please enter your Description",
                category: "Please enter your catogory"
                
            },
            submitHandler: function(form) {

                let formData = new FormData($(form));
                var url = $(form).attr('action_data');
                $.ajax({
                        type: "POST",
                        url: url, 
                        //contentType: 'multipart/form-data',
                        //data: $(form).serialize(),
                        data: formData,                                          
                    success: function (data) { 
                        $('#productform').modal('hide');
                        // alert('data store succesfully');
                        alert(data.message);
                    },
                    error: function(data) { 
                         //console.log(data);
                        //alert(data);
                        if(data.responseJSON.name) {
                            $(".name_error").html(data.responseJSON.name[0]);
                        }
                        // if(data.responseJSON.title) {
                        //     $(".title_error").html(data.responseJSON.title[0]);
                        // }
                        if(data.responseJSON.description) {
                            $(".description_error").html(data.responseJSON.description[0]);
                        }

                    }
                  
                });
            
            }
        });
      });

//-----------------------edit on click--------------------------------------//
        $('.table').on('click','.editProductBtn',function(){
            var product_id = $(this).attr('data-id');
            var url = $(this).attr('data-remote');
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (data) { 
                    console.log(data.success)
                    $('#editProductModal').find('.modal-body').html(data.html);
                    $('#editProductModal').modal('show');
                    // editValidation();
                },
                error: function (data) {
                    //console.log('Error:', data);
                }
            });
        });

   function editValidation() {

        $('#editProductForm').validate({
            rules: { 
                name: "required",
                title: "required",
                description: "required",
            },  
            messages: {
                name: "Please enter your name",
                title: "Please enter your Title",
                description: "Please enter your Description",
                
            },
            submitHandler: function(form) {
              
               let formData = new FormData($(form));
                var url = $(form).attr('action');
                $.ajax({
                        type: "POST",
                        url: url,  
                     //  data: $('form').serialize(),                     
                    success: function (data) { 
                        $('#refresh').DataTable();
                     //  $('#refresh').load(document.URL +  ' #refresh');
                       $('#editProductModal').modal('hide');
                       alert('data update succesfully');
                        
                    },
                    error: function (data) {   
                        if(data.responseJSON.name) {
                            $(".name_error").html(data.responseJSON.name[0]);
                        }
                        if(data.responseJSON.title) {
                            $(".title_error").html(data.responseJSON.title[0]);
                        }
                        if(data.responseJSON.description) {
                            $(".description_error").html(data.responseJSON.description[0]);
                        }
                    }
                });
            
            }
        });
   }

   //----------delete------------//
   $('body').on('click', '.deleteProduct', function () {
     
     var id = $(this).data("id");
     confirm("Are You sure want to delete !");
     
     $.ajax({
         type: "DELETE",
        
         success: function (data) {
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
       });
    
   });  


   </script>



@endsection 






  