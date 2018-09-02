
@extends('layouts.app')

@section('content')
<h2>Users</h2>

<div class="card">
  <div class="card-body">
      <a href="{{ url('/user') }}" class="btn btn-secondary float-right">Return</a> 
      <h2 class="card-title">Create </h2>
        @include('component.alert')        
       <form action="{{ url('/user') }}" method="post">
       		@csrf
       	<div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input value="{{ old('name') }}" name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter Name">
            @if($errors->has('name')) 
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
              @endif
          </div>
        </div>
			  <div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input value="{{ old('email') }}" name="email" type="text" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter email">
            @if($errors->has('email')) 
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
              @endif
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label">Password</label>
			    <div class="col-sm-10">
			      <input value="{{ old('password') }}" name="password" type="password"  class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter password">
            @if($errors->has('password')) 
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
              @endif
			    </div>
			  </div>
			  
        <div class="form-group row">
			    <label for="confirm_password" class="col-sm-2 col-form-label">Confrim Password</label>
			    <div class="col-sm-10">
			      <input value="{{ old('password_confirmation') }}" name="password_confirmation" type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" placeholder="Enter password confirmation">
            @if($errors->has('confirm_password')) 
                    <span class="invalid-feedback">{{ $errors->first('confirm_password') }}</span>
              @endif
			    </div>
			  </div>

         <div class="form-group row">
          <label for="location_id" class="col-sm-2 col-form-label">Location</label>
          <div class="col-sm-10">
            <select name="location_id[]" class="form-control @if($errors->has('location_id')) is-invalid @endif name="location_id" multiple> 
              <option value="">Choose</option>
              @foreach($locations as $location)
                <option {{ $location->id == old('location_id') ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>
              @endforeach
            </select>
            @if($errors->has('location_id')) 
                    <span class="invalid-feedback">{{ $errors->first('location_id') }}</span>
              @endif
          </div>
        </div>

			  <div class="form-group row">
			  	<div class="col-sm-2 sm-offset-10">
				  <button type="submit" class="btn btn-primary">Save</button>
				</div>
       </form>
  </div>
</div>

@endsection


