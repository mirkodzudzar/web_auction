<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This gives us possibility to store bunch of data faster.
        for ($i = 0; $i < 20; $i++) {
            $data[] = User::factory()->definition();
        }
        $chunks = array_chunk($data, 10);
        foreach ($chunks as $chunk) {
            // We can even insert data which is much faster, but than we need to add values for timestamps also.
            User::insert($chunk);
        }

        User::factory()->randomUser()->create();
    }
}
