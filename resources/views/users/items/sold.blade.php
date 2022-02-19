@extends('layout')

@section('content')
  @section('page_title', "All items that you have sold")
  @forelse ($items as $item)
    <div>
      @if ($item->image)
        <img src="{{ $item->image->url() }}">
      @endif
      <p>
        <a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
      </p>
      <p>{{ $item->final_price }} RSD</p>
      <hr>
    </div>
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection