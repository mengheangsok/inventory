
@extends('layouts.app')

@section('content')
<h2>ITEMS</h2>

<div class="card">
  <div class="card-body">

            @include('component.alert')        


      <a href="{{ url('/item/create') }}" class="btn btn-primary float-right">Add New</a> 
      <h2 class="card-title">Lists </h2>
    
      <table class="table">
          <thead>
              <tr>
                   <th>#</th>
                  <th>Image</th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Option</th>
              </tr>
          </thead>
          <tbody>
            @php
                $n = 1;
            @endphp
              @foreach($items as $item)
                <tr>
                    <td>{{ $n }}</td>
                    <td><img width="50px" src="{{ asset('/images/'.$item->image) }}"></td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <a href="{{ url('/item/edit/'.$item->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ url('/item/delete/'.$item->id) }}" method="post">
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
        {{ $items->links() }}
  </div>
</div>

@endsection


