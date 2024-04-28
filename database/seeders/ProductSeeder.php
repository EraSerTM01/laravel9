<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = Category::inRandomOrder()->get();

        foreach ($categories as $category) {
            $productCount = rand(1, 3);

            Product::factory()->count($productCount)->create([
                'category_id' => $category->id
            ]);
        }
    }
}
