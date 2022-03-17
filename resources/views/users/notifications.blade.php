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
                    <form action="{{ route('users.notifications.markAsRead', ['user' => auth()->id(), 'id' => $notification->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Mark as read</button>
                    </form>
                @else
                    <form action="{{ route('users.notifications.markAsUnread', ['user' => auth()->id(), 'id' => $notification->id]) }}" method="POST">
                        @csrf
                        <button type="submit">Mark as unread</button>
                    </form>
                @endif
            </p>
            @if (!$loop->last)
                <hr>
            @else
                <form action="{{ route('users.notifications.markAllRead', ['user' => auth()->id()]) }}" method="POST">
                    @csrf
                    <button type="submit">Mark all read</button>
                </form>
            @endif
        </div>
    @empty
        <p>No notifications yet.</p>
    @endforelse
@endsection