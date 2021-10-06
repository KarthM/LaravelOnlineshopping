@extends('master')
@section("content")
<div class="custom-details">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><br><br>
           <img class="detail-img"src="{{$products['gallery']}}" alt="">
            </div>
            <div class="col-md-6">
            <a  class="text-right" href="">Back</a>

           <h3>{{$products['name']}}</h3>
           <p class="text-bold">Description about the product: {{$products['description']}}</p>
           <span>Price: {{$products['price']}}</span>
           <h5>Category:{{$products['category']}}</h5>
           
           <form action="/addtocart" method="post">
           @csrf
           <input type="hidden" name="product_id" value="{{$products['id']}}">
               <button class="btn btn-primary">Add to cart</button>
           </form><br>
               <button class="btn btn-success">buy now</button>
               </div>          
            </div>
        </div>
    </div>
        
       
</div>
@endsection