<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->word()),
            'description' => $this->faker->text(1000),
            'starting_price' => $this->faker->numberBetween(1, 1000000),
            'expires_at' => now()->addDays(10),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'condition_id' => Condition::inRandomOrder()->first()->id,
            'status_id' => Item::$active,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
