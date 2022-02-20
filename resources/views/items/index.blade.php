@extends('layout')

@section('content')
  @section('page_title', 'Web auction')

  @foreach ($items as $item)
    <x-item-card :item="$item"></x-item-card>
  @endforeach
@endsection