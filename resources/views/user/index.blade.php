
@extends('layouts.app')

@section('content')
<h2>Users</h2>

<div class="card">
  <div class="card-body">

            @include('component.alert')        


      <a href="{{ url('/user/create') }}" class="btn btn-primary float-right">Add New</a> 
      <h2 class="card-title">Lists </h2>
    
      <table class="table">
          <thead>
              <tr>
                   <th>#</th>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Location</th>
                  <th>Option</th>
              </tr>
          </thead>
          <tbody>
            @php
                $n = 1;
            @endphp
              @foreach($users as $user)
                <tr>
                    <td>{{ $n }}</td>
                    <td>
                        @if($user->status == 0)
                            <span class="label label-default">Inactive</span>
                        @elseif($user->status == 1)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-warning">Waiting Approval</span>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <ul>
                        @foreach($user->location as $locaton)
                            <li>{{ $locaton->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ url('/user/'.$user->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ url('/user/'.$user->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $n++;
                @endphp
              @endforeach
          </tbody>
      </table>
        {{ $users->links() }}
  </div>
</div>

@endsection


