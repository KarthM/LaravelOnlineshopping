@extends('master')
@section("content")
<div class="container">
   <div class="col-md-2">
<a class="text-center" href="">Filter</a>
   </div>
     <div class="col-md-10">
         <div class="trending-wrapper">
        <h3>Search Products</h3>
        @foreach($products as $item)
        <div class="trening-item">
          <a href="detail/{{$item['id']}}">
          <img class="trending-image" src="{{$item['gallery']}}">
          <div class="">
            <h3>{{$item['name']}}</h3>
            <p>$ {{$item['price']}}</p>
            <p>{{$item['description']}}</p>
          </div>
        </a>
        </div>
        @endforeach
      </div>
     </div><br>
      </div>
</div>
@endsection