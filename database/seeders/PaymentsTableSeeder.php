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

        Item::each(function (Item $item) {
            $item->payments()->sync(Payment::pluck('id')->random());
        });
    }
}
