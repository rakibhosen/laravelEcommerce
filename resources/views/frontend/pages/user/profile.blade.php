@extends('frontend.pages.user.master')

@section('sub-content')

	          <div class="card-body">
            <form method="POST" action="{{ route('user.profile.update') }}">
             {{ csrf_field() }}

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                  @if ($errors->has('name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>




               

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                  @if ($errors->has('email'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="phone_no" class="col-md-4 col-form-label text-md-right">Phone No</label>

                <div class="col-md-6">
                  <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ $user->phone_no }}" required>

                  @if ($errors->has('phone_no'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="division_id" class="col-md-4 col-form-label text-md-right">Division</label>

                <div class="col-md-6">
                  <select class="form-control" name="division_id">
                    <option value="">Please select your division</option>
                    @foreach ($divisions as $division)
                      <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="district_id" class="col-md-4 col-form-label text-md-right">District</label>

                <div class="col-md-6">
                  <select class="form-control" name="district_id">
                    <option value="">Please select your district</option>
                    @foreach ($districts as $district)
                      <option value="{{ $district->id }}"{{ $user->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              


              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">New Password (optional)</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                  @if ($errors->has('password'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

  

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                   Update Profile
                  </button>
                </div>
              </div>
            </form>
          </div>

@endsection