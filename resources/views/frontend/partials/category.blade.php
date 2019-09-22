<div class="container">
<div class="jumbotron">
	<!-- Nav tabs -->
	<ul class="tablist" role="tablist">
	  <li role="presentation" class="active"><a href="#featured-item" aria-controls="featured-item" role="tab" data-toggle="tab">Featured Item</a></li>



	  @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
      
	  <li role="presentation">
	  <a href="{{route('categories.show',$parent->id)}}" aria-controls="best-seller" >
	  {{$parent->name}}
	  </a>
	  </li>
	  @endforeach
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
   @include('frontend.partials.slider')
  
</div><!-- tabcontent -->

	</div> <!-- jumbotron -->
</div><!-- container -->
