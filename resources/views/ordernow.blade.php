@extends('master')
@section("content")
    <div class="row"><br>
<div class="custom-product">
       <h3><center>Order summary</center></h3>
     <div class="col-sm-6 offset-3" style="margin-top:10px;">
        <table class="table">
         
            <tbody>
              <tr>
                <td>Amount</td>
              <td>$ {{$total}}</td>
              </tr>
              <tr>
                <td>Tax</td>
                <td>$ 0</td>
              </tr>
              <tr>
                <td>Delivery </td>
                <td>$ 10</td>
              </tr>
              <tr>
                <td>Total Amount</td>
              <td>$ {{$total+10}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="/orderplace" method="POST" >
              @csrf
                <div class="form-group">
                  <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Payment Method</label> <br> <br>
                  <input type="radio" value="online" name="payment"> <span>paytm payment</span> <br> <br>
                  <input type="radio" value="Installments" name="payment"> <span>credit/debit cards</span> <br><br>
                  <input type="radio" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

                </div>
                <button type="submit" class="btn btn-success">Order Now</button>
              </form>
          </div>
     </div>
    </div>
</div>
@endsection 