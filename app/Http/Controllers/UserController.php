<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
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

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()
                         ->withStatus('Your profile has been updated.');
    }

    public function items_index(User $user)
    {
        $items = Item::where('user_id', $user->id)->where('status', 'active')->get();

        return view('users.items.index', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function items_buyed(User $user)
    {
        $this->authorize($user);

        $items = Item::where('buyer_id', $user->id)->where('status', 'sold')->get();

        return view('users.items.buyed', [
            'user' => $user,
            'items' => $items,
        ]);
    }
}
