@extends('layouts.app')

@section('content')
@include('component.alert')        

<table>
  <tr>
    <td>Name</td>
    <th>{{ $location->name }}</th>
  </tr>
</table>

@endsection