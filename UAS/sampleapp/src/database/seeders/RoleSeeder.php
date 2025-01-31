<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $hrd = Role::firstOrCreate(['name' => 'hrd', 'guard_name' => 'web']);
        
        $permissions = [
            'view_activity_log', 'view_any_activity_log', 'create_activity_log', 'update_activity_log', 'delete_activity_log', 'delete_any_activity_log',
            'view_role', 'view_any_role', 'create_role', 'update_role', 'delete_role', 'delete_any_role',
            'view_user', 'view_any_user', 'create_user', 'update_user', 'delete_user', 'delete_any_user',
            'view_karyawan', 'view_any_karyawan', 'create_karyawan', 'update_karyawan', 'delete_karyawan', 'delete_any_karyawan',
            'view_departemen', 'view_any_departemen', 'create_departemen', 'update_departemen', 'delete_departemen', 'delete_any_departemen'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $super_admin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(Permission::all());

        $hrd->givePermissionTo([
            'view_karyawan', 'view_any_karyawan', 'create_karyawan', 'update_karyawan', 'delete_karyawan', 'delete_any_karyawan',
            'view_departemen', 'view_any_departemen', 'create_departemen', 'update_departemen', 'delete_departemen', 'delete_any_departemen'
        ]);
    }
}