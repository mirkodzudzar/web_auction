<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use App\Models\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

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
        if ($item->status->isSold()) {
            if(is_null($user)) return false;
            
            // Only owner and buyer are able to visit sold item.
            return $user->id === $item->user->id || $user->id === $item->buyer->id;
        }

        if (!$item->status->isActive() || $item->isExpired()) {
            // If we are guest, we can not visit item that is not active or expired.
            if(is_null($user)) return false;

            return $user->id === $item->user->id;
        }

        return true;
    }
    
    public function cancelItem(User $user, Item $item)
    {
        if ($item->status->isActive() && !$item->isExpired()) {
            return $user->id === $item->user->id;
        }

        return false;
    }

    public function bid(User $user, Item $item)
    {
        // You can not bid for your own item.
        if ($item->user->id === $user->id) return false;

        if ($item->status->isActive() && !$item->isExpired()) {
            $itemUser = $item->bidUsers()
                             ->where('user_id', $user->id)
                             ->first();

            // Will return true if we have not bid yet.
            return is_null($itemUser);
        }

        return false;

    }

    public function cancelBid(User $user, Item $item)
    {
        // You can not cancel bid for your own item.
        if ($item->user->id === $user->id) return false;

        if ($item->status->isActive() && !$item->isExpired()) {
            $itemUser = $item->bidUsers()
                             ->where('user_id', $user->id)
                             ->where('status_id', Status::ACTIVE)
                             ->first();
            // Will return true if we have bid already.
            return isset($itemUser);
        }

        return false;
    }

    public function calculate(User $user, Item $item)
    {
        if (is_null($item->buyer)) return false;

        if ($item->user->id === $user->id || $item->buyer->id === $user->id)
        {
            return true;
        }

        return false;
    }
}
