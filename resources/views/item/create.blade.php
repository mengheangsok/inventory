
@extends('layouts.app')

@section('content')
<h2>ITEMS</h2>
<?php  var_dump($errors) ?>
<div class="card">
  <div class="card-body">
      <a href="{{ url('/item') }}" class="btn btn-secondary float-right">Return</a> 
      <h2 class="card-title">Create </h2>
        @include('component.alert')        
       <form action="{{ url('/item/store') }}" method="post" enctype="multipart/form-data">
       		@csrf
       	<div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input value="{{ old('name') }}" name="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter Code">
            @if($errors->has('name')) 
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
              @endif
          </div>
        </div>
			  <div class="form-group row">
			    <label for="code" class="col-sm-2 col-form-label">Code</label>
			    <div class="col-sm-10">
			      <input value="{{ old('code') }}" name="code" type="text" class="form-control @if($errors->has('code')) is-invalid @endif" placeholder="Enter Code">
            @if($errors->has('code')) 
                    <span class="invalid-feedback">{{ $errors->first('code') }}</span>
              @endif
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="code" class="col-sm-2 col-form-label">Price</label>
			    <div class="col-sm-10">
			      <input value="{{ old('price') }}" name="price" type="text" class="form-control" placeholder="Enter Price">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="image" class="col-sm-2 col-form-label">Thumnail</label>
			    <div class="col-sm-10">
			      <input value="{{ old('image') }}" name="image" type="file" class="form-control" placeholder="Enter Browse Image">
			    </div>
			  </div>

         <div class="form-group row">
          <label for="category" class="col-sm-2 col-form-label">Category</label>
          <div class="col-sm-10">
            <select name="category_id" class="form-control" name="category_id">
              <option value="">Choose</option>
              @foreach($categories as $category)
                <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
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


