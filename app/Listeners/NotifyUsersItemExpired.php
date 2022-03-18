<?php

namespace App\Listeners;


use App\Jobs\ThrottledNotification;
use App\Notifications\ItemExpiredNotification;

class NotifyUsersItemExpired
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
            new ItemExpiredNotification($event->item),
        );
    }
}
