<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUser;

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
}
