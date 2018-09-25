
@extends('layouts.app')

@section('content')
<h2>Users</h2>

<div class="card">
  <div class="card-body">
      <a href="{{ url('/user') }}" class="btn btn-secondary float-right">Return</a> 
      <h2 class="card-title">Edit </h2>
        @include('component.alert')        
       <form action="{{ url('/user/'.$user->id) }}" method="post">
       		@csrf
           {{ method_field('PATCH') }}
       	<div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input value="{{ old('name',$user->name) }}" name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter Name">
            @if($errors->has('name')) 
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
              @endif
          </div>
        </div>
			  <div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input value="{{ old('email',$user->email) }}" name="email" type="text" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter email">
            @if($errors->has('email')) 
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
              @endif
			    </div>
			  </div>

         <div class="form-group row">
          <label for="location_id" class="col-sm-2 col-form-label">Location</label>
          <div class="col-sm-10">
            <select name="location_id[]" class="form-control @if($errors->has('location_id')) is-invalid @endif" name="location_id" multiple> 
              <option value="">Choose</option>
              @foreach($locations as $location)
                <option {{ in_array($location->id,old('location_id',$location_users)) ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>
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


