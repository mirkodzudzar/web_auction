@extends('layout')

@section('page_title', "All comments about a user $user->full_name")

@section('content')
  <a href="{{ route('users.items.index', ['user' => $user->id]) }}">Back to users items list</a>
  @forelse ($user->comments as $comment)
    <div>
      <p>{{ $comment->text }}</p>
      <p>Commented <i>{{ $comment->created_at->diffForHumans() }},</i></p>
      <p>by <small><a href="{{ route('users.items.index', ['user' => $comment->commentator->id]) }}">{{ $comment->commentator->full_name }}</a></small></p>
      <hr>
    </div>
  @empty
    <p>No items yet.</p>
  @endforelse
@endsection