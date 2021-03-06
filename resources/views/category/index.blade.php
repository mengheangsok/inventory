
@extends('layouts.app')

@section('content')
<h2>Categories</h2>

<div class="card">
  <div class="card-body">

      @include('component.alert')        

      <a href="{{ url('/category/create') }}" class="btn btn-primary float-right">Add New</a> 
      <h2 class="card-title">Lists </h2>
    
      <table class="table">
          <thead>
              <tr>
                   <th>#</th>
                  <th>Name</th>
                  <th>Items</th>
                  <th>Option</th>
              </tr>
          </thead>
          <tbody>
            @php
                $n = 1;
            @endphp
              @foreach($categories as $category)
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                      <ul>
                        @foreach($category->item as $item)
                          <li>{{ $item->name }}</li>
                        @endforeach
                      </ul>
                    </td>
                    <td>
                        <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ url('/category/delete/'.$category->id) }}" method="post">
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
        {{ $categories->links() }}
  </div>
</div>

@endsection


