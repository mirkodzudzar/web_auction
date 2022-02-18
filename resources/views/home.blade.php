@extends('layout')

@section('content')
  @foreach ($items as $item)
    <div>
      <p>{{ $item->name }}</p>
      <p>{{ $item->description }}</p>
      <p>Starting price: {{ $item->starting_price }} RSD</p>
      <i>User: {{ $item->user->email }}</i>
      <hr>
    </div>
  @endforeach
@endsection