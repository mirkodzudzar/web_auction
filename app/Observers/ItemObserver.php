<?php

namespace App\Observers;

use App\Models\Item;

class ItemObserver
{
    public function creating(Item $item)
    {
        $item->expires_at = now()->addDays(10);
    }
}
