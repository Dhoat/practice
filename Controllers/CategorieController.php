<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CategorieController extends Controller
{
    public function index(){  
       $categorie = Categorie::paginate(2);
      return view('admin.categories.index',compact('categorie'));
      
    }
    public function create()
    {
        $categorie = Categorie::all();
         
        return view('admin.categories.create',compact('categorie'));
    }
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name'    => 'required|string',
               
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $categorie = Categorie::insert([
            'name'       => $request->name,
            'slug'       => Str::slug($request->name),
            'parent'     => $request->parent,
        ]);

       return redirect()->back()->with('success', 'Categorie ADD  successfully!');
    } 
    public function edit(Categorie $categorie)
    {
        
        return view('admin.categories.edit', compact('categorie'));
    }
    public function update(Request $request, Categorie $categorie)
    {
        
        $validator = Validator::make($request->all(), [
          'name'    => 'required|string',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if($categorie->slug != Str::slug($request->name))
        {
           $categorie->slug  = Str::slug($request->name); 
        }     
        
        $categorie->name = $request->name;       
        $categorie->slug = $request->slug;       
        $categorie->parent = $request->parent;       
        $result          =   $categorie->save();

       return redirect()->back()->with('success', 'User Update  successfully!');
    }

    public function delete($categorie)
    {     
        $categories = Categorie::find($categorie);
        $categories->delete();
        return redirect()->back()->with('success', 'User Delete  successfully!');
    }
}
