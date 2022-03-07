<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = collect(["Unused", "Used", "Collector's item", "Defective"]);

        $conditions->each(function($conditionName) {
            Condition::create([
                'name' => $conditionName,
            ]);
        });
    }
}
