@extends('layout')

@section('content')
  @foreach ($items as $item)
    <div>
      @if ($item->image)
        <img src="{{ $item->image->url() }}" style="width: 25%">
      @endif
      <p>
        <a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
      </p>
      <p>Starting price: {{ $item->starting_price }} RSD</p>
      <hr>
    </div>
  @endforeach
@endsection