@extends('layout')

@section('content')
  @section('page_title', "All items of a user $user->full_name")
  @forelse ($items as $item)
    <x-item-card :item="$item"></x-item-card>
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection