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
        Category::all()->each(function (Category $category) {
            Item::factory(5)->make([
                'category_id' => $category->id,
            ])->each(function (Item $item) {
                $item->user()->associate(User::inRandomOrder()->take(1)->first());
                $item->condition()->associate(Condition::inRandomOrder()->take(1)->first());
                $item->save();
            });
        });
    }
}
