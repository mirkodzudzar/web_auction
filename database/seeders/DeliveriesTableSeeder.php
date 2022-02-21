<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveries = collect(['City Express', 'Post Express', 'Daily Express', 'Personal']);

        $deliveries->each(function ($deliveryName) {
            $delivery = new Delivery();
            $delivery->name = $deliveryName;
            $delivery->save();
        });

        Item::all()->each(function (Item $item) {
            $item->deliveries()->sync(Delivery::inRandomOrder()->take(2)->get()->pluck('id'));
        });
    }
}
