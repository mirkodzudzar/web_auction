<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function itemsBought(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function itemsSold(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function createComment(User $user, User $model)
    {
        if ($user->id === $model->id) return false;

        $userCommentsCount = $model->comments()
                                   ->where('commentator_id', $user->id)
                                   ->count();

        // You can leave only one comment for each user,
        // and you can not leave comment about yourself.
        if ($userCommentsCount > 0) {
            return false;
        }

        return true;
    }

    public function seeNotifications(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function markAsRead(User $user, User $model)
    {
        return $user->id === $model->id;
    }
    
    public function markAsUnread(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function markAllRead(User $user, User $model)
    {
        return $user->id === $model->id;
    }
}
