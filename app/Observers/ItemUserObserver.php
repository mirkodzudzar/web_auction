<?php

namespace App\Observers;

use App\Models\ItemUser;
use App\Models\Status;

class ItemUserObserver
{
    /**
     * Handle the ItemUser "creating" event.
     *
     * @param  \App\Models\ItemUser  $itemUser
     * @return void
     */
    public function creating(ItemUser $itemUser)
    {
        $itemUser->status()->associate(Status::ACTIVE);
    }
}
