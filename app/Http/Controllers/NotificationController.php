<?php

namespace App\Http\Controllers;

use App\Models\User;

class NotificationController extends Controller
{
    
    public function index(User $user)
    {
        $this->authorize('seeNotifications', $user);

        return view('users.notifications', [
            'notifications' => $user->notifications,
        ]);
    }

    public function markAsRead(User $user, $id)
    {
        $this->authorize('markAsRead', $user);

        $notification = $user->notifications()->where('id', $id)->first();
        $notification->markAsRead();

        return back();
    }

    public function markAsUnread(User $user, $id)
    {
        $this->authorize('markAsUnread', $user);

        $notification = $user->notifications()->where('id', $id)->first();
        $notification->markAsUnread();

        return back();
    }

    public function markAllRead(User $user)
    {
        $this->authorize('markAllRead', $user);

        $user->notifications()->each(function ($notification) {
            $notification->markAsRead();
        });

        return back();
    }
}
