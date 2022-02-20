@extends('layout')

@section('content')
  @section('page_title', "Items search")
  @if (isset($result))
    <p>Total result(s): {{ $items->count() }}, for term: {{ $result }}</p>
  @endif
  @if (isset($items))
    @foreach ($items as $item)
      <x-item-card :item="$item"></x-item-card>
    @endforeach
  @else  
    <p>You have not searched for any item.</p>
  @endif
@endsection