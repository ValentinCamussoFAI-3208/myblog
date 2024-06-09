<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear categorías si no existen
        $categories = [
            ['title' => 'Age of Empires 2'],
            ['title' => 'Age of Empires 3'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['title' => $category['title']], $category);
        }
    }
}
