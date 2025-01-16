<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recupera as categorias já criadas pelo CategorySeeder
        $categories = \App\Models\Category::all();

        // Itera sobre cada categoria e cria 5-15 (pode ser editado a vontade) produtos para cada uma
        $categories->each(function ($category) {
            \App\Models\Product::factory(random_int(5, 15))->create([
                'category_id' => $category->id,
            ]);
        });
    }
}
