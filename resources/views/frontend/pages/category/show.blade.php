@extends('frontend.layout.master')

@section('content')


<div class="container">

<div class="widget">
    <h2 class="text-center mt-5 mb-2">All Product in <span class="badge badge-info">{{$category->name}}</span></h2>


    @php 
        $products = $category->products()->paginate(9);
    @endphp

    
        @if($products->count()>0)
        @include('frontend.pages.product.partials.all_product')
        @else
                <div class="alert alert-warning">
                    No product has added yet in this  category
                </div>
        @endif
    
        
</div>
</div>


@endsection