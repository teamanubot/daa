<?php

namespace Database\Seeders;

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
                    'password' => bcrypt('password'),
                ],
                [
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('admin123'),
                ],
                [
                    'name' => 'Staff',
                    'email' => 'staff@admin.com',
                    'password' => bcrypt('staff123'),
                ],
                [
                    'name' => 'Customer',
                    'email' => 'customer@admin.com',
                    'password' => bcrypt('cust123'),
                ],
            ]);

            foreach ($users as $user) {
                if ($user->email == 'superadmin@admin.com') {
                    $user->assignRole('super_admin');
                }
                if ($user->email == 'admin@admin.com') {
                    $user->assignRole('admin');
                }
                if ($user->email == 'staff@admin.com') {
                    $user->assignRole('staff');
                }
                if ($user->email == 'customer@admin.com') {
                    $user->assignRole('customer');
                }
            }
        }
    }

    private function callSeeders(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            PayMethodSeeder::class,
        ]);
    }
}