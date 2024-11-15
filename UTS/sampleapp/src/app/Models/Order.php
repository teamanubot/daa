<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_date', 'status', 'total_price'];

    protected static function booted()
    {
        static::creating(function ($order) {
            if (Auth::check()) {
                $order->user_id = Auth::id();
            }
            $order->status = 'pending';
        });
    }


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}