@extends('frontend.layout.master')

@section('content')
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-4">
			<div class="list-group">
				
				<a href="{{route('user.dashboard')}}" class="list-group-item {{Route::is('user.dashboard') ? 'active' : ''}}">Dashboard</a>

				<a href="{{route('user.profile')}}" class="list-group-item {{Route::is('user.profile') ? 'active' : ''}}">Profile Update</a>

				
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card card-body">
				@yield('sub-content')
			</div>
		</div>
	</div>
</div>

@endsection
