<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = ([
            ['name' => 'Adidas', 'harga' => 2000000, 'category' => 'sepatu'],
            ['name' => 'Nike', 'harga' => 1500000, 'category' => 'sepatu'],
            ['name' => 'Levis', 'harga' => 150000, 'category' => 'celana'],
            ['name' => 'Uniqlo', 'harga' => 200000, 'category' => 'baju'],
        ]);

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}