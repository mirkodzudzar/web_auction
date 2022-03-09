<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\CreateComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['itemsIndex']);
    }
    
    public function edit(User $user)
    {
        $this->authorize($user);

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUser $request, User $user)
    {
        $this->authorize($user);
        
        $validated = $request->validated();
        $validated['password'] = is_null($validated['password']) ? $user->password : Hash::make($validated['password']);

        $user->update($validated);

        return redirect()->back()
                         ->withStatus('Your profile has been updated.');
    }

    public function itemsIndex(User $user)
    {
        $items = $user->items()
                      ->withImageAndBidUsersCount()
                      ->get();

        return view('users.items.index', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function itemsBought(User $user)
    {
        $this->authorize($user);

        $items = $user->buyerItems()
                      ->where('status', 'sold')
                      ->withImageAndBidUsersCount()
                      ->get();

        return view('users.items.bought', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function itemsSold(User $user)
    {
        $this->authorize($user);

        $items = $user->items()
                      ->where('status', 'sold')
                      ->withImageAndBidUsersCount()
                      ->get();

        return view('users.items.sold', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function comments(User $user)
    {
        return view('users.comments', [
            'user' => $user,
        ]);
    }

    public function createComment(CreateComment $request, User $user)
    {
        $this->authorize($user);
        
        $validated = $request->validated();
        $comment = Comment::make([
            'text' => $validated['text'],
        ]);
        
        $comment->user()->associate($user);
        $comment->commentator()->associate(Auth::user());

        $comment->save();

        return redirect()->route('users.comments', ['user' => $user->id])
                         ->withStatus("You have commented on user '{$user->full_name}'");
    }

    public function notifications(User $user)
    {
        $this->authorize($user);

        $notifications = $user->notifications;

        return view('users.notifications', [
            'notifications' => $notifications,
        ]);
    }

    public function markAsRead(User $user, $id)
    {
        $notification = $user->notifications()->where('id', $id)->first();
        $notification->markAsRead();

        return redirect()->back();
    }

    public function markAsUnread(User $user, $id)
    {
        $notification = $user->notifications()->where('id', $id)->first();
        $notification->markAsUnread();

        return redirect()->back();
    }

    public function markAllRead(User $user)
    {
        $user->notifications()->each(function ($notification) {
            $notification->markAsRead();
        });

        return redirect()->back();
    }
}
