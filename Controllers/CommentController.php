<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
class CommentController extends Controller
{
    public function index(){  
      $comments = Comment::paginate(2);
      return view('admin.comments.index',compact('comments'));
      
    }
    public function create(){
       $posts = Post::all();
       return view('admin.comments.create',compact('posts'));
    }
    public function store(Request $request){
      $validatedData = $request->validate([
        'status' => 'required|string',
        'comment' => 'required',

      ]);
     
    
      $comment = new Comment();
      $comment->comment  = $request->comment;
      $comment->user_id  = auth()->user()->id;
      $comment->post_id  = $request->post_id;
      $comment->status   = $request->status;
      $comment->save();
      
     return redirect()->back()->with('success', 'Comments ADD  successfully!');
    }
     public function edit(Comment $comment)
    {   $posts = Post::all();
        return view('admin.comments.edit', compact('comment','posts'));
    }
   public function update(Request $request, Comment $comment)
   {
      $validatedData = $request->validate([
          'status' => 'required|string',
          'comment' => 'required',
      ]);
      
      $comment->comment = $request->comment;
      $comment->post_id = $request->post_id;
      $comment->status = $request->status;
      $comment->save();

      return redirect()->back()->with('success', 'Comment updated successfully!');
  }


    public function destroy($comment)
    {     
        $comments = Comment::find($comment);
        $comments->delete();
        return redirect()->back()->with('success', 'Comments Delete  successfully!');
    }
}
