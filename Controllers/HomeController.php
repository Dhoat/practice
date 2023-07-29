<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(Auth::id()){

            $role = Auth()->user()->role;
           
            if($role == 'user'){

                return view('home');
            }
            if($role == 'admin'){
                 
                return view('admin.adminhome');
            }
          
        }
        
    }
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $SERVER_API_KEY = 'AAAAvCLVMtI:APA91bHp9IXZrVn2dltf6xbXqe4c2VdklnZBHJ7Yoq27JmNavZVNHzTAclaX5yCbavlIdUbVxLTxbut5HxrsJSnwPHLYQP62ff5ajclH-c7ezgUPESj98ncBHLRnEjwgpD9fl4w_kFfh';
  
        $data = [
           // "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
         return  $response ;
        //($response);
    }   
}
