<?php

namespace App\Listeners;

use App\Jobs\ThrottledNotification;
use App\Notifications\ItemSoldUserNotification;
use App\Notifications\ItemSoldBuyerNotification;

class NotifyUsersItemSold
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        ThrottledNotification::dispatch(
            $event->item->user,
            new ItemSoldUserNotification($event->item),
        );

        ThrottledNotification::dispatch(
            $event->item->buyer,
            new ItemSoldBuyerNotification($event->item),
        );
    }
}
