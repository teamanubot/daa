<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'PLA', 'description' => 'PLA filament, suitable for most general applications.'],
            ['name' => 'ABS', 'description' => 'ABS filament, highly durable and heat resistant.'],
            ['name' => 'TPU', 'description' => 'TPU filament, flexible and strong, ideal for wearable parts.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}