<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Status;
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
            $item->category()->associate(Category::inRandomOrder()->take(1)->first());
            $item->user()->associate(User::inRandomOrder()->take(1)->first());
            $item->condition()->associate(Condition::inRandomOrder()->take(1)->first());
            $item->status()->associate(Status::where('id', Status::ACTIVE)->first());
            $item->save();
        });
    }
}
