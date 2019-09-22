@extends('frontend.layout.master')

@section('content')
<div class="container margin-top-20">
<h2 class="text-center">My carts Items</h2>
@if(App\models\Cart::totalItems() > 0) 
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Product title</th>
        <th>Product Image</th>
        <th>Product Quantity</th>
        <th>Unit Price</th>
        <th>Sub Total Price</th>
        <th>Delete</th>

      </tr>
    </thead>
       <tbody>
    @php 
    $total_price = 0;
    @endphp

    @foreach(App\models\Cart::totalCarts() as $cart)
    <tr>
        <td>{{$loop->index+1}}</td>
        <td>
           <a href="{{ route('products.show',$cart->product->slug) }}">{{$cart->product->title}}</a>
        </td>

        <td>
           @if($cart->product->imgs->count() >0) 
            <img src="{{asset('img/product/'.$cart->product->imgs->first()->image)}}" width="80px" height="80px">
            @endif
      </td>

       <td>
        <form class="form-inline" method="post" action="{{route('carts.update',$cart->id)}}">
            {{ csrf_field() }}
            <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
            <button type="submit" class="btn btn-success ml-1">update</button>
        </form>
        </td>

        <td>{{$cart->product->price}} Taka</td>

        <td>
            @php 
            $total_price += $cart->product->price *$cart->product_quantity;
            @endphp
            {{ $cart->product->price * $cart->product_quantity}} taka
        </td>
        
        <td>
            <form class="form-inline" method="post" action="{{route('carts.delete',$cart->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="cart_id">
                <button type="submit" class="btn btn-danger"> delete</button>
            </form>
        </td>
    </tr>
    @endforeach
          <td colspan="4"></td>
          <td>Total amount</td>
          <td colspan="2">
          <strong>{{$total_price}} taka</strong>
          </td>

      </tbody>
    </table>

    <div class="float-right">
        <a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
        <a href="{{ route('checkout.index') }}" class="btn btn-warning btn-lg">Checkout</a>
    </div>

      <div class="clearfix"></div>
      @else
      <div class="alert alert-warning">
          <strong>There is no item in your cart.</strong>
          <br>
          <a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
      </div>
    @endif
</div>

@endsection