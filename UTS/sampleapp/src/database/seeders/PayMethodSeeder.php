<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PayMethod;

class PayMethodSeeder extends Seeder
{
    public function run()
    {
        $methods = [
            ['method_name' => 'E-wallet', 'description' => 'Pembayaran melalui e-wallet seperti GoPay, OVO, dll.'],
            ['method_name' => 'Credit Card', 'description' => 'Pembayaran menggunakan kartu kredit'],
            ['method_name' => 'Bank Transfer', 'description' => 'Transfer bank ke rekening resmi'],
            ['method_name' => 'Cash on Delivery', 'description' => 'Pembayaran langsung di tempat saat pengiriman']
        ];

        foreach ($methods as $method) {
            PayMethod::UpdateOrCreate($method);
        }
    }
}
