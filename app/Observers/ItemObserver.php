<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Status;

class ItemObserver
{
    public function creating(Item $item)
    {
        $item->status()->associate(Status::active()->first());
        $item->expires_at = Carbon::now()->addDays(10);
    }
}
