<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Categorie; 
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Auth;
class PostController extends Controller
{
    public function index()
    {  
      $posts = Post::paginate(2);
      return view('admin.posts.index',compact('posts'));
      
    } 
      public function create()
    {   
        $categories = Categorie::all();
        return view('admin.posts.create',compact('categories'));
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title'    => 'required|string',
            'content'  => 'required|string',
            'image'    => 'file|mimes:jpg,jpeg,png,gif|max:1024',
            'category' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image_path = $request->file('image')->store('image', 'public');
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $image_path;
        $post->author = Auth::user()->name;
        $post->status = $request->status;
        $post->category = $request->category; 
        $post->slug = Str::slug($request->title);
        $post->save();

        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }

     public function edit(Post $post)
    {
        $categories = Categorie::all();
        return view('admin.posts.edit', compact('post','categories'));
    }
    public function update(Request $request, Post $post)
    {
        
        $validator = Validator::make($request->all(), [
          'title'    => 'required|string',
          'content'  => 'required|string', 
          'category' => 'required|string',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } 
        $image_path = $request->file('image')->store('image', 'public');    
        if(!empty($request->title))
        {
            $post->title =$request->title;
        }
        if($post->slug != Str::slug($request->title))
        {
           $post->slug     = Str::slug($request->title); 
        }
        $post->category =  $request->category;       
        $post->content  =  $request->content;
        $post->image    =  $image_path;
        $post->author   =  Auth::user()->name;
        $post->status   =  $request->status;
        $result         =  $post->save();

       return redirect()->back()->with('success', 'User Update  successfully!');
    }

    public function delete($post)
    {     
        $users = Post::find($post);
        $users->delete();
        return redirect()->back()->with('success', 'User Delete  successfully!');
    }

}




        