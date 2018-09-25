
@extends('layouts.master')

@section('content')

    <section class="content-header">
      <h1>
        Items
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
    <section class="content">

        <div class="card">
            <div class="card-body">

                        @include('component.alert')        


                <a href="{{ url('/item/create') }}" class="btn btn-primary float-right">{{ trans('general.create') }}</a> 
                <h2 class="card-title">{{ __('general.list') }} </h2>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Location</th>
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
                                    <ul>
                                        @foreach($item->location as $location)
                                        <li>{{ $location->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ url('/item/edit/'.$item->id) }}" class="btn btn-info btn-sm pull-left" style="margin-right:10px;">Edit</a>
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
    </section>

@endsection


