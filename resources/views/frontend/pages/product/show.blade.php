
	@extends('frontend.layout.master')

@section('content')

<section id="products" class="">
<div class="container">
      <div class="row">
	
	<div class="col-md-4">
	
	  <div class="thumbnail">
	  <h4>{{$product->title}}</h4>
	  <h4>Price-<b>{{$product->price}}</b> taka</h4>


	    

 
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  @php $i=1; @endphp
  @foreach($product->imgs as $img)
    <div class="item {{$i==1? 'active':''}}">
	<img src="{{ asset('img/product/'.$img->image)}}" height="400px;">
    </div>
    @php $i++; @endphp
    @endforeach



  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


	  <p>Description-<b>{{ $product->description }}</b></p>
	  <p>Brand-<b>{{ $product->brand->name }}</b></p>
	  <p>Category-<b>{{ $product->category->name }}</b></p>
	  </div> <!-- row -->
</div>
	</section>
@endsection
