<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = collect(['Active', 'Canceled', 'Expired', 'Sold']);

        $statuses->each(function ($statusName) {
            Status::create([
                'name' => $statusName,
            ]);
        });
    }
}
