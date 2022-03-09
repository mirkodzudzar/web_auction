<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Mail\ItemSold;
use App\Models\Status;
use App\Mail\ItemBought;
use App\Models\ItemUser;
use App\Mail\ItemExpired;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ItemStatusNotification;

class ItemCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expired items and update the needed columns';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Item Cron is working fine!");

        $items = Item::expired()->active()->get();

        $highestPrice = 0;
        foreach($items as $item)
        {
            // Order by date of creation to start from oldest bids.
            // In case that there are multiple highest prices that are equeal, first user that bid will be used as a buyer.
            $itemUsers = ItemUser::where('item_id', $item->id)->active()->orderBy('created_at', 'ASC')->get();
            if (count($itemUsers) === 0) {
                // There is no buyer for this item.
                $item->status()->associate(Status::expired()->first());
                Mail::to($item->user)->send(new ItemExpired($item));
                Notification::send($item->user, new ItemStatusNotification(($item)));
            } else {
                foreach ($itemUsers as $itemUser) {
                    if ($itemUser->price > $item->starting_price && $itemUser->price > $highestPrice) {
                        $highestPrice = $itemUser->price;

                        $item->final_price = $highestPrice;
                        $item->buyer_id = $itemUser->user->id;
                        $item->status()->associate(Status::sold()->first());
                    }
                }

                Mail::to($item->user)->send(new ItemSold($item));
                Notification::send($item->user, new ItemStatusNotification(($item)));
            }

            $item->save();
            if ($item->buyer) {
                Mail::to($item->buyer)->send(new ItemBought($item));
                Notification::send($item->buyer, new ItemStatusNotification(($item)));
            }
        }
    }
}
