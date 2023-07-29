<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<form id="product" method="POST">
    @csrf
  <div class="form-group">
    <label for="productname">Product Name</label>
    <input type="text" class="form-control" id="productname" aria-describedby="productname"  name="name" placeholder="Enter Product name"> 
  </div>
  <div class="form-group">
    <label for="producttitle">Product Title</label>
    <input type="text" class="form-control" id="producttitle" aria-describedby="producttitle" name="title"  placeholder="Enter Product title"> 
  </div>
  <div class="form-group">
    <label for="productdescription">Product Description</label>
    <input type="text" class="form-control" id="productdescription" aria-describedby="productdescription"  name="description" placeholder="Enter Product description"> 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>