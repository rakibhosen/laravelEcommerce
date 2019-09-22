@extends('frontend.layout.master')

@section('content')
<div class="container">
   

			<div class="widget">
				<h2 class="text-center">Search for : <span class="badge badge-primary">{{$search}}</span></h2>
					@include('frontend.pages.product.partials.all_product')
			</div>
		</div>
		<!-- end product content -->


@endsection