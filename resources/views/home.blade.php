@extends('layout')

@section('content')
  @foreach ($items as $item)
    <div>
      <p>
        <a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
      </p>
      <p>{{ $item->description }}</p>
      <p>Starting price: {{ $item->starting_price }} RSD</p>
      <i>User: {{ $item->user->email }}</i>
      <hr>
    </div>
  @endforeach
@endsection