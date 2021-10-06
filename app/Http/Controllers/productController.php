<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\cart;
use App\Models\order;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class productController extends Controller
{
    function index(){

        $data=product::all();
        return view('product',['products'=>$data]);
    }
    function detail($id){
        $data= product::find($id);
        return view('detail',['products'=>$data]);
    }
    function search(Request $request){
        $data=product::where('name','like','%'.$request->input('query').'%')->get();
        if(!$data){
            return "no product found";
    }else{
        
        return view('search',['products'=>$data]);
    }

}

function addtocart(Request $request){
    if($request->session()->has('user')){
        $cart=new cart;
        $cart->user_id=$request->session()->get('user')['id'];
        $cart->product_id=$request->product_id;
        $cart->save();
        return redirect('/');
    }else{
        return redirect('/login');
    }
}
 static function cartitem(){
    $user_id=Session::get('user')['id'];
    return cart::where('user_id',$user_id)->count();
}
function cartList()
    {
        if(Session::has('user'))
        {
        $userId=Session::get('user')['id'];
      $products= DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
        }else{
            return redirect('/login');
        }
       
    }
    function removecart($id){
        cart::destroy($id);
        return redirect('/cartlist');
    }
    function ordernow()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('carts')
         ->join('products','carts.product_id','=','products.id')
         ->where('carts.user_id',$userId)
         ->select('products.*')
         ->sum('products.price');
 
         return view('ordernow',['total'=>$total]);
    }
    function orderplace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             cart::where('user_id',$userId)->delete(); 
         }
         $req->input();
         return redirect('/');
    }
    function myorder(){
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();
 
         return view('myorder',['orders'=>$orders]);
    
    }
}
