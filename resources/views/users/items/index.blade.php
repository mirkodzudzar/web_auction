@extends('layout')

@section('content')
  @section('page_title', "All items of a user $user->full_name")
  @guest
    <p><a href="{{ route('login') }}">Log in</a> to leave a comment</p>
  @else
    <a href="{{ route('users.comments', ['user' => $user->id]) }}">See all comments about this user</a>
  
    @can('createComment', $user)
      <h4>Add new comment</h4>
      <form action="{{ route('users.comments.create', ['user' => $user->id]) }}" method="POST">
        @csrf
        <textarea name="text" id="text" cols="30" rows="5">{{ old('text') }}</textarea><br>
        <x-error field="text"></x-error>
        <button type="submit">Add comment</button>
      </form>
    @else
      @if (auth()->id() !== $user->id)
        <p>You have already commented on this user.</p>      
      @endif
    @endcan
  @endguest
  @forelse ($items as $item)
    @can('view', $item)
      <x-item-card :item="$item"></x-item-card>
    @endcan
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection