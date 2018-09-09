
@extends('layouts.app')

@section('content')
<h2>Locations</h2>

<div class="card">
  <div class="card-body">

      @include('component.alert')        

      <a href="{{ url('/location/create') }}" class="btn btn-primary float-right">Add New</a> 
      <h2 class="card-title">Lists </h2>
    
      <table class="table">
          <thead>
              <tr>
                   <th>#</th>
                  <th>Name</th>
                  <th>User</th>
                  <th>Option</th>
              </tr>
          </thead>
          <tbody>
            @php
                $n = 1;
            @endphp
              @foreach($locations as $location)
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $location->name }}</td>
                    <td>
                        <ul>
                            @foreach($location->user as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="row">
                        <a href="{{ url('/location/'.$location->id) }}" class="btn btn-secondary btn-sm mr-2">Details</a>
                        <a href="{{ url('/location/'.$location->id.'/edit') }}" class="btn btn-info btn-sm mr-2">Edit</a>
                        <form action="{{ url('/location/'.$location->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger float-left">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @php
                    $n++;
                @endphp
              @endforeach
          </tbody>
      </table>
        {{ $locations->links() }}
  </div>
</div>

@endsection


