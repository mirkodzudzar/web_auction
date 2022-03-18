@extends('layout')

@section('content')

@section('page_title', 'Web auction')
    @forelse ($items as $item)
        <x-item-card :item="$item"></x-item-card>  
    @empty
        <p>Not items yet!</p>
    @endforelse
@endsection