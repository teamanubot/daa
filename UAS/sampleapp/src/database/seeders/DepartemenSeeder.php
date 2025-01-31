<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departemen;

class DepartemenSeeder extends Seeder
{
    public function run()
    {
        $departemens = [
            ['nama_departemen' => 'IT', 'lokasi' => 'Jakarta'],
            ['nama_departemen' => 'HRD', 'lokasi' => 'Surabaya'],
            ['nama_departemen' => 'Keuangan', 'lokasi' => 'Bandung'],
            ['nama_departemen' => 'Marketing', 'lokasi' => 'Yogyakarta']
        ];

        foreach ($departemens as $dept) {
            Departemen::updateOrCreate(['nama_departemen' => $dept['nama_departemen']], $dept);
        }
    }
}
