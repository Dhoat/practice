<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function index(){  
    
      $users = User::paginate(3);
      return view('admin.users.index',compact('users'));
      
    }

      public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request){
  
      $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role'  => 'required',
            'status' => 'required',
            'password' => 'required',

        ]);

        User::create($request->all());
        return redirect()->back()->with('success', 'Your message was sent successfully!');
        
    }
    public function edit(User $user)
    {
        
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->update($validatedData);

       return redirect()->back()->with('success', 'User Update  successfully!');
    }

    public function destroy($user)
    {    
      
        $users = User::find($user);
        $users->delete();
        return redirect()->back()->with('success', 'User Delete  successfully!');
    }
   

    
}
