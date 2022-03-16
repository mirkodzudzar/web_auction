<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class ItemUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function (User $user) {
            // This is faster, but we need whole Item object to get 'starting_price' value.
            // $items = Item::where('user_id', "!=", $user->id)->inRandomOrder()->take(5)->pluck('id');
            Item::where('user_id', "!=", $user->id)->inRandomOrder()->take(5)->each(function (Item $item) use ($user) {
                $user->bidItems()->attach($item->id, ['price' => rand($item->starting_price + 1, 1000000)]);
            });
        });
    }
}
