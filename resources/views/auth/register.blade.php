@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                @include('frontend.partials.message')

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
 

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
    <label for="phone_no" class="col-md-4 control-label">Phone</label>
    <div class="col-md-6">
    <input id="phone_no" type="number" class="form-control" name="phone_no" value="{{ old('phone_no') }}" required>
    @if ($errors->has('phone_no'))
        <span class="help-block">
            <strong>{{ $errors->first('phone_no') }}</strong>
        </span>
    @endif
    </div>
    </div>

->
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label"> Address</label>

        <div class="col-md-6">
            <textarea id="address" type="text" class="form-control" name="address" ></textarea>

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>


            <div class="form-group{{ $errors->has('division_id') ? ' has-error' : '' }}">
            <label for="division_id" class="col-md-4 control-label">Division</label>

            <div class="col-md-6">
            <div class="form-group">
              <select class="form-control" name="division_id">
              <option value="">Please select a division </option>
              @foreach(App\Models\division::orderBy('name','asc')->get() as $division)
               <option value="{{ $division->id }}">{{ $division->name }}</option>
               @endforeach
                </select>
                @if ($errors->has('division_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('division_id') }}</strong>
                    </span>
                   @endif
            </div>
             </div>

             <div class="form-group{{ $errors->has('district_id') ? ' has-error' : '' }}">
            <label for="district_id" class="col-md-4 control-label">district</label>
             <div class="col-md-6">
                 <div class="form-group">
               <select class="form-control" name="district_id">
              <option value="">Please select a district the product</option>
              @foreach(App\Models\district::orderBy('name','asc')->get() as $district)
               <option value="{{ $district->id }}"> {{$district->name}}</option>
               @endforeach
                </select>
                @if ($errors->has('district_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('district_id') }}</strong>
                    </span>
                @endif
            </div>
             </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
