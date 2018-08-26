@extends('layouts.app')

@section('content')

<form>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name"placeholder="Enter Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection