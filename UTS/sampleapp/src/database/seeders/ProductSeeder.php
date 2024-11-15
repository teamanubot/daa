<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'PLA Filament White',
                'description' => 'High quality PLA filament in white color.',
                'price' => 120000.00,
                'stock' => 100,
                'category_id' => Category::where('name', 'PLA')->first()->id,
            ],
            [
                'name' => 'ABS Filament Black',
                'description' => 'Durable ABS filament in black color.',
                'price' => 100000.00,
                'stock' => 75,
                'category_id' => Category::where('name', 'ABS')->first()->id,
            ],
            [
                'name' => 'TPU Filament Clear',
                'description' => 'Flexible TPU filament in clear color.',
                'price' => 80000.00,
                'stock' => 50,
                'category_id' => Category::where('name', 'TPU')->first()->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}