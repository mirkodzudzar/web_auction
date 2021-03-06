@extends('layout')

@section('content')
  @section('page_title', "All items of a user $user->full_name")
  @forelse ($items as $item)
    @can('view', $item)
      <x-item-card :item="$item"></x-item-card>
    @endcan
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection