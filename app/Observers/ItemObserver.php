<?php

namespace App\Observers;

use App\Models\Item;
use App\Models\Status;

class ItemObserver
{
    public function creating(Item $item)
    {
        $item->status()->associate(Status::ACTIVE);
        $item->expires_at = now()->addDays(10);
    }
}
