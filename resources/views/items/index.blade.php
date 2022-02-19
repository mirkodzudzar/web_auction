@extends('layout')

@section('content')
  @section('page_title', 'Web auction')

  <form action="{{ URL::current() }}" method="GET">
    @if (isset($result))
      <a href="{{ URL::current() }}">Refresh</a>
    @endif
    <input type="text" name="search" value="{{ $result ?? '' }}" required>
    <input type="submit" value="Search">
    @if (isset($result))
      <p>Total results: {{ $items->count() }}, for term: {{ $result }}</p>
    @endif
  </form>

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