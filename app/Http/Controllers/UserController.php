<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\CreateComment;

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
        $validated['password'] = is_null($validated['password']) ? $user->password : bcrypt($validated['password']);

        $user->update($validated);

        return back()->withStatus('Your profile has been updated.');
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
                      ->onlySoldItems()
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
                      ->onlySoldItems()
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
        $comment->commentator()->associate(auth()->id());

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

        return back();
    }

    public function markAsUnread(User $user, $id)
    {
        $notification = $user->notifications()->where('id', $id)->first();
        $notification->markAsUnread();

        return back();
    }

    public function markAllRead(User $user)
    {
        $user->notifications()->each(function ($notification) {
            $notification->markAsRead();
        });

        return back();
    }
}
