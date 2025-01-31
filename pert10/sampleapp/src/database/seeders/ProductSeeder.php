<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Enums\ProductCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = ([
            ['name' => 'Adidas', 'harga' => 2000000, 'category' => ProductCategory::Sepatu->value],
            ['name' => 'Nike', 'harga' => 1500000, 'category' => ProductCategory::Sepatu->value],
            ['name' => 'Levis', 'harga' => 150000, 'category' => ProductCategory::Celana->value],
            ['name' => 'Uniqlo', 'harga' => 200000, 'category' => ProductCategory::Baju->value],
        ]);

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}