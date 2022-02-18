<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Item;

class ItemObserver
{
    public function creating(Item $item)
    {
        $item->status = 'active';
        $item->expires_at = Carbon::now()->addDays(10);
    }
}
