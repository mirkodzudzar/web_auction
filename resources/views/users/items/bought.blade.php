@extends('layout')

@section('content')
  @section('page_title', "All items that you have bought")
  @forelse ($items as $item)
    <div>
      @if ($item->image)
        <img src="{{ $item->image->url() }}">
      @endif
      <p>{{ $item->name }}</p>
      <p>{{ $item->final_price }} RSD</p>
      <hr>
    </div>
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection