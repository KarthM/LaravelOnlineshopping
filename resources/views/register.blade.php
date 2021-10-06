@extends('master')
@section('content')
<div class="container custom_login">

    <div class="row">
   
        <div class="col-sm-4 offset-md-4 p-5 bg-success">
           
<form action="\register" method="POST">
    @csrf
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">UserName</label>
    <input type="text" class="form-control" name="name" placeholder="Username">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  
  
  <button type="submit" class="btn btn-danger">Register</button>
</form>
         
        </div>
    </div>
</div>
@endsection