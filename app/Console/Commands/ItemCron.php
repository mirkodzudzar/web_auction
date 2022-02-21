<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\ItemUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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

        $items = Item::where('expires_at', '<=', Carbon::now())->where('status', 'active')->get();

        $highestPrice = 0;
        foreach($items as $item)
        {
            // Order by date of creation to start from oldest bids.
            // In case that there are multiple highest prices that are equeal, first user that bid will be used as a buyer.
            $itemUsers = ItemUser::where('item_id', $item->id)->where('status', 'active')->orderBy('created_at', 'ASC')->get();
            if (count($itemUsers) === 0) {
                // There is no buyer for this item.
                $item->status = 'expired';
            } else {
                foreach ($itemUsers as $itemUser) {
                    if ($itemUser->price > $item->starting_price && $itemUser->price > $highestPrice) {
                        $highestPrice = $itemUser->price;

                        $item->final_price = $highestPrice;
                        $item->buyer_id = $itemUser->user->id;
                        $item->status = 'sold';
                    }
                }
            }    

            $item->save();
        }
    }
}
