<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMethod extends Model
{
    use HasFactory;
    protected $table = 'paymethods';
    protected $fillable = [
        'method_name', 'description'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_method', 'method_name');
    }
}
