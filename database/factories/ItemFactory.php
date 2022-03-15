<?php

namespace Database\Factories;

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
        ];
    }
}
