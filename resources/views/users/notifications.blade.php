@extends('layout')

@section('page_title', "List of your notifications")

@section('content')
  @forelse ($notifications as $notification)
    <div>
      <p>
        @if ($notification->unread())
          <i class='fas fa-bell'></i>
        @else
          <i class='far fa-bell'></i>
        @endif
        Status of item <a href="{{ route('items.show', ['item' => $notification->data['item_id']]) }}"><b>{{ $notification->data['name'] }}</b></a>
        has been changed to <b>{{ $notification->data['status'] }}</b>
        {{ $notification->created_at->diffForHumans() }}.
        @if ($notification->unread())
          <a href="{{ route('users.notifications.markAsRead', ['user' => auth()->id(), 'id' => $notification->id]) }}">Mark as read</a>
        @else
          <a href="{{ route('users.notifications.markAsUnread', ['user' => auth()->id(), 'id' => $notification->id]) }}">Mark as unread</a>
        @endif
      </p>
      @if (!$loop->last)
        <hr>
      @else
        <a href="{{ route('users.notifications.markAllRead', ['user' => auth()->id()]) }}">Mark all read</a>
      @endif
    </div>
  @empty
    <p>No notifications yet.</p>
  @endforelse
@endsection