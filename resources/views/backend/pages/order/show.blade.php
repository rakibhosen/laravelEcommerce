@extends('backend.layout.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        View Order #LE{{ $order->id }}
      </div>
      <div class="card-body">
        @include('backend.partials.message')
        <h3>Order Inromations</h3>
        <div class="row">
          <div class="col-md-6 border-right">
            <p><strong> Name : </strong>{{$order->name}}</p>
            <p><strong> Phone : </strong>{{ $order->phone_no }}</p>
            <p><strong> Email : </strong>{{ $order->email }}</p>
            <p><strong> Shipping Address : </strong>{{ $order->shipping_address }}</p>
          </div>
          <div class="col-md-6">
            <p><strong>Order Payment Method: </strong> {{ $order->payment->name }}</p>
            <p><strong>Order Payment Transaction: </strong> {{ $order->transaction_id }}</p>
          </div>
        </div>
        <hr>
        <h3>Ordered Items: </h3>


        @if($order->carts->count()> 0)
        <table class="table table-bordered table-stripe">
          <thead>
            <tr>
              <th>No.</th>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Product Quantity</th>
              <th>Unit Price</th>
              <th>Sub total Price</th>
              <th>
                Delete
              </th>
            </tr>
          </thead>
          <tbody>
      
            @foreach ($order->carts as $cart)
            <tr>
              <td>
                {{ $loop->index + 1 }}
              </td>
              
            </tr>
          </tbody>
          @endforeach
        </table>
     @else
     <p>not getting</p>
     @endif
        
        

      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
