<?php

namespace App\Services;

use App\Models\Item;
use App\Events\ItemSold;
use App\Events\ItemExpired;

class CronService
{
    // Updating expired item when there is some datetime that is older than current time,
    // Setting proper status and additionaly buyer and final price if possible.
    public function updateExpiredItems()
    {
        $items = Item::expiredButStillActive()->get();

        foreach($items as $item)
        {
            // Order by date of creation to start from oldest bids.
            // In case that there are multiple highest prices that are equeal, first user that bid will be used as a buyer.
            $itemUsers = $item->bidUsers()->onlyActiveBidItemUsers()->orderBy('created_at', 'ASC')->get();

            if ($itemUsers->count() === 0) {
                // There is no buyer for this item.
                $item->status()->associate(Item::$expired);
                $item->save();
                event(new ItemExpired($item));
            } else {
                $item->final_price = 0;
                foreach ($itemUsers as $itemUser) {
                    if ($itemUser->pivot->price > $item->starting_price && $itemUser->pivot->price > $item->final_price) {

                        $item->final_price = $itemUser->pivot->price;
                        $item->buyer()->associate($itemUser->id);
                        $item->status()->associate(Item::$sold);
                    }
                }
                $item->save();
                event(new ItemSold($item));
            }
        }
    }
}