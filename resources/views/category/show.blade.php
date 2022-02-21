@extends('layout')

@section('content')
  @section('page_title', "$category->name category")
  {{-- To have less queries. --}}
  @forelse ($category->items()->withImageAndBidUsersCount()->onlyActiveItems()->get() as $item)
    <x-item-card :item="$item"></x-item-card>
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection