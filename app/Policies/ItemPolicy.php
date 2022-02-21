<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use App\Models\ItemUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     * ?User means that when there is a quest user, it will be able to view item page.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Item $item)
    {
        // Only owner and buyer are able to visit sold item.
        if ($item->status === 'sold') {
            return $user->id === $item->user->id || $user->id === $item->buyer->id;
        }

        if ($item->status !== 'active' || $item->isExpired()) {
            // If we are guest, we can not visit item that is not active or expired.
            if(is_null($user)) return false;

            return $user->id === $item->user->id;
        }

        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    public function cancel_item(User $user, Item $item)
    {
        if ($item->status === 'active' && !$item->isExpired()) {
            return $user->id === $item->user->id;
        }

        return false;
    }

    public function bid(User $user, Item $item)
    {
        // You can not bid for your own item.
        if ($item->user->id === $user->id) return false;

        if ($item->status === 'active' && !$item->isExpired()) {
            $item_user = ItemUser::where('item_id', $item->id)
                                 ->where('user_id', $user->id)
                                 ->first();

            // Will return true if we have not bid yet.
            return is_null($item_user);
        }

        return false;

    }

    public function cancel_bid(User $user, Item $item)
    {
        // You can not cancel bid for your own item.
        if ($item->user->id === $user->id) return false;

        if ($item->status === 'active' && !$item->isExpired()) {
            $item_user = ItemUser::where('item_id', $item->id)
                             ->where('user_id', $user->id)
                             ->where('status', 'active')
                             ->first();
            // Will return true if we have bidden already.
            return isset($item_user);
        }

        return false;
    }
}
