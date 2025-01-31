<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = ['nama_departemen', 'lokasi'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}

