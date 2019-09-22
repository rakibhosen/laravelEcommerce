<section id="products" class="">
<div class="container">
      <div class="row">
	  @foreach($products as $product)
	<div class="col-md-4">
	
	  <div class="thumbnail">
	  <h4 class="text-center"><a href="{!! route('products.show', $product->slug) !!}">{{$product->title}}</a></h4>
	  @php $i=1; @endphp
	  @foreach($product->imgs as $img)
	  @if($i>0)
		<img src="{{ asset('img/product/'. $img->image) }}" height="400px">
		@endif
	@php $i--; @endphp
	@endforeach

	    <div class="caption">
	      <h4 class="pull-right">{{$product->price}} TK</h4>
	     
@include('frontend.pages.product.partials.cart_button')
	    </div> <!-- caption -->
	  </div> <!-- thumbnail -->
	</div> <!-- col-md-4 -->
@endforeach
<div class="pagination">
		{{ $products->links("pagination::bootstrap-4") }}
		
	</div>
	  </div> <!-- row -->
</div>
    </section>
