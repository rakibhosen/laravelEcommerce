@extends('frontend.pages.user.master')

@section('sub-content')
<h2 class="text-center">Welcome {{ $user->name }}</h2>
<p></p>
<hr>
<div class="row">
	<div class="col-lg-4">
	<div class="card card-body mt-2 pointer" onclick="location.href='{{ route('user.profile') }}' ">
			<h4 class="text-center">Update Profile</h4>
			
		</div>
	</div>
	<div class="col-lg-8">
	<p>Address: {{ $user->address }}</p>
	</div>
</div>

@endsection