@extends('layouts.app')

@section('content')
@include('component.alert')        

<form action="{{ route('category.store') }}" method="post">
{!! csrf_field() !!}

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name"placeholder="Enter Name">
    @if($errors->has('name')) 
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection