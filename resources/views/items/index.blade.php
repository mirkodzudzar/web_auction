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
    <x-item-card :item="$item"></x-item-card>
  @endforeach
@endsection