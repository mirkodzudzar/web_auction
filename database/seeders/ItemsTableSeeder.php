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
        Item::factory(50)->make()->each(function (Item $item) {
            $item->category()->associate(Category::inRandomOrder()->first()->id);
            $item->user()->associate(User::inRandomOrder()->first()->id);
            $item->condition()->associate(Condition::inRandomOrder()->first()->id);
            $item->save();
        });
    }
}
