@extends('layout')

@section('content')
  @section('page_title', 'Web auction')

  @foreach ($items as $item)
    <div>
      @if ($item->image)
        <img src="{{ $item->image->url() }}">
      @endif
      <p>
        <a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
      </p>
      <p>{{ $item->starting_price }} RSD</p>
      <hr>
    </div>
  @endforeach
@endsection