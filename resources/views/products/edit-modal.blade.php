
<form id="editProductForm" action="{{ route('products.update', $product->id) }}" >
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="productname">Product Name</label>
        <input type="text" class="form-control" id="productname" aria-describedby="productname"  value="{{ $product->name }}" name="name" placeholder="Enter Product name"> 
        <span class="text-danger error-text  name_error" i></span>
    </div>
    <div class="form-group">
        <label for="producttitle">Product Title</label>
        <input type="text" class="form-control" id="producttitle" aria-describedby="producttitle"  value="{{ $product->title }}" name="title"  placeholder="Enter Product title"> 
        <span class="text-danger error-text  title_error" i></span>
    </div>
    <div class="form-group">
        <label for="productdescription">Product Description</label>
        <input type="text" class="form-control" id="productdescription" aria-describedby="productdescription" value="{{ $product->description }}"  name="description" placeholder="Enter Product description"> 
        <span class="text-danger error-text  description_error" i></span>
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit"  id="update" class="btn btn-primary">Update</button>
</form>