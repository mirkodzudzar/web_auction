@extends('layout')

@section('content')
  @section('page_title', "$category->name category")
  @forelse ($items as $item)
    <x-item-card :item="$item"></x-item-card>
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection