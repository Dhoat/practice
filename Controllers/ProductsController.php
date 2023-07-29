<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\File;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Pagination\Paginator;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $products = Product::with('category')->paginate(5);
        $categories = Category::get();
        return view('products', compact('products','categories'));
  
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $validator = Validator::make($request->all(), [
            'name'          => 'required|alpha|max:120',
           // 'title'       => 'required|min:3',
            'description'   => 'required|min:3',
            'category_id'   => 'required',
           
        ]);
        if($validator->fails()) {    
           return response()->json($validator->errors(), 422);
       
        }
        $product = new Product();
        $product->name =  $request->get('name');
        $product->description =  $request->get('description');
        $product->category_id =  $request->get('category_id');
        $product->save();

        Product::insert([
            'name'         =>$request->name,
            'title'        =>$request->title,
            'description'  =>$request->description,
            
        ]);
 
        return [
            'status'  =>200,
            'message' => "record add successfully"
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       $products= DB::table('products')
                ->select('*')
                ->where('id','=',$id)
                ->get();
               
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $product = Product::find($id);
        $categories = Category::get();
        $file = File::WHERE( array('module_type' => 'product', 'module_value' => $id))->get()->first();
        $htmlForm = view('products.edit-modal', compact('product','file','categories'))->render();
        return response()->json(array('success' => true, 'html'=>$htmlForm));
    
       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
      
        $validator = Validator::make($request->all(), [
            'name'         => 'required|alpha|min:3',
            'description'  => 'required|min:3',
            'category_id'  => 'required',
           
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->description =  $request->get('description');
        $product->category_id =  $request->get('category_id');
        $product->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete(); 
 
        return redirect('/products')->with('success', 'product removed.');
    }
    public function list(Request $request) {
      
        $data = Product::all();
        return $data ;

    }
}
