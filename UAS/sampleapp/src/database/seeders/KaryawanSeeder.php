<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\User;
use App\Models\Departemen;
use Carbon\Carbon;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $karyawans = [
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@email.com',
                'jabatan' => 'Software Engineer',
                'tanggal_bergabung' => Carbon::parse('2023-01-10'),
                'departemen_id' => Departemen::where('nama_departemen', 'IT')->first()->id,
                'user_id' => User::role('admin')->first()->id
            ],
            [
                'nama' => 'Ani Wijaya',
                'email' => 'ani@email.com',
                'jabatan' => 'HR Manager',
                'tanggal_bergabung' => Carbon::parse('2022-07-15'),
                'departemen_id' => Departemen::where('nama_departemen', 'HRD')->first()->id,
                'user_id' => User::role('hrd')->first()->id
            ]
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::updateOrCreate(['email' => $karyawan['email']], $karyawan);
        }
    }
}
