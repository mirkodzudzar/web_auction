<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::factory(5)->create();

        Item::all()->each(function (Item $item) {
            $item->payments()->sync(Payment::inRandomOrder()->take(1)->get()->pluck('id'));
        });
    }
}
