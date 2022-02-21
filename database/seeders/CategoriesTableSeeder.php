<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Books', 'Clothes', 'Art', 'Cars', 'Music']);

        $categories->each(function ($categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->save();
        });
    }
}
