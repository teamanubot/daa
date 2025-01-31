<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->seedUsers();
        $this->callSeeders();
    }

    private function seedUsers(): void
    {
        if (!User::where('email', 'admin@admin.com')->exists()) {
            $users = User::factory()->createmany([
                [
                    'name' => 'Super Admin',
                    'email' => 'superadmin@admin.com',
                    'password' => bcrypt('superadmin123'),
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('admin123'),
                ],
                [
                    'name' => 'hrd',
                    'email' => 'hrd@admin.com',
                    'password' => bcrypt('hrd123'),
                ],
            ]);

            foreach ($users as $user) {
                if ($user->email == 'superadmin@admin.com') {
                    $user->assignRole('admin');
                }
                if ($user->email == 'admin@admin.com') {
                    $user->assignRole('admin');
                }
                if ($user->email == 'hrd@admin.com') {
                    $user->assignRole('hrd');
                }
            }
        }
    }

    private function callSeeders(): void
    {
        $this->call([
            DepartemenSeeder::class,
            KaryawanSeeder::class,
        ]);
    }
}