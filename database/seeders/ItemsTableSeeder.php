<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This gives us possibility to store bunch of data faster.
        for ($i = 0; $i < 50; $i++) {
            $data[] = Item::factory()->definition();
        }
        $chunks = array_chunk($data, 10);
        foreach ($chunks as $chunk) {
            // We can even insert data which is much faster, but than we need to add values for timestamps also.
            Item::insert($chunk);
        }
        
        // This is slow even with 50 data
        // Item::factory(50)->make()->each(function (Item $item) {
        //     $item->category()->associate(Category::inRandomOrder()->first()->id);
        //     $item->user()->associate(User::inRandomOrder()->first()->id);
        //     $item->condition()->associate(Condition::inRandomOrder()->first()->id);
        //     $item->save();
        // });
    }
}
