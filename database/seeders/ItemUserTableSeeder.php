<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use App\Models\Status;
use App\Models\ItemUser;
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
            Item::inRandomOrder()->take(5)->get()->each(function (Item $item) use ($user) {
                ItemUser::create([
                    'item_id' => $item->id,
                    'user_id' => $user->id,
                    'price' => rand($item->starting_price + 1, 1000000),
                    'status_id' => Status::ACTIVE,
                ]);
            });
        });
    }
}
