
@extends('layouts.app')

@section('content')
<h2>ITEMS</h2>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Create</h5>
       <form action="{{ url('/item/store') }}" method="post">
       		@csrf
       		<div class="form-group row">
			    <label for="name" class="col-sm-2 col-form-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Enter Name">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="code" class="col-sm-2 col-form-label">Code</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Enter Code">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="code" class="col-sm-2 col-form-label">Price</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="Enter Price">
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


