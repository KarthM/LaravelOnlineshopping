<?php
use App\Http\Controllers\productController;
$total=0;
if(Session::has('user')){
$total=productController::cartitem();
}
?>

<div class="bs-example">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><i class="fa fa-shopping-basket fa-2x pt-0"></i>Shopp
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item mr-4">
          <a class="nav-link" href="/myorder">Order</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Product</a>
        </li>
      </ul>
      <form  action="/search"class="d-flex">
        <input class="form-control me-2" type="search" name="query"placeholder="Search" aria-label="Search">
        <button class="btn btn-primary"  type="submit">Search</button>
      </form>

      <ul class="nav navbar-nav navbar-right cart">
      <li class="nav-item">
          <a class="nav-link" href="/cartlist" tabindex="-2">Cart({{$total}})</a>
        
        </li>
        @if(Session::has('user'))
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{Session::get('user')['name']}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/logout">Logout</a>
          <a class="dropdown-item" href="/register">Register</a>
        </div>
      </li>
      @else
     <li> <a href="/login">Login</a></li>
     @endif
      </ul>
    </div>
  </div>
</nav>
</div>