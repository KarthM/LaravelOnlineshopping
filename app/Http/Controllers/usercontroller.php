<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index(Request $request)
    {
       $user=user::where(['email'=>$request->email])->first();
       if(!$user||!Hash::check($request->password,$user->password)){
           return "username or password not match";

       }else{
           $request->session()->put('user',$user);
           return redirect('/');
       }
    }

    function register(Request $request){
       $user=new user;
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->save();
       return redirect('/login');
    }
}
