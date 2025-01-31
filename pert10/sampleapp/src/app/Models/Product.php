<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'harga', 'category'
    ];

    protected $casts = [
        'category' => ProductCategory::class,
    ];
}
