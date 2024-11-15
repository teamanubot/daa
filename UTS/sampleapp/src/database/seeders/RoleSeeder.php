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
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $staff = Role::firstOrCreate(['name' => 'Staff', 'guard_name' => 'web']);
        $customer = Role::firstOrCreate(['name' => 'Customer', 'guard_name' => 'web']);
        
        $permissions = [
            'view_activity_log', 'view_any_activity_log', 'create_activity_log', 'update_activity_log', 'delete_activity_log', 'delete_any_activity_log',
            'view_category', 'view_any_category', 'create_category', 'update_category', 'delete_category', 'delete_any_category',
            'view_order', 'view_any_order', 'create_order', 'update_order', 'delete_order', 'delete_any_order',
            'view_product', 'view_any_product', 'create_product', 'update_product', 'delete_product', 'delete_any_product',
            'view_role', 'view_any_role', 'create_role', 'update_role', 'delete_role', 'delete_any_role',
            'view_user', 'view_any_user', 'create_user', 'update_user', 'delete_user', 'delete_any_user',
            'view_payment', 'view_any_payment', 'create_payment', 'update_payment', 'delete_payment', 'delete_any_payment',
            'view_pay_method', 'view_any_pay_method', 'create_pay_method', 'update_pay_method', 'delete_pay_method', 'delete_any_pay_method'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $superAdmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo(Permission::all());

        $staff->givePermissionTo([
            'view_category', 'view_any_category', 'create_category', 'update_category', 'delete_category', 'delete_any_category',
            'view_order', 'view_any_order', 'create_order', 'update_order', 'delete_order', 'delete_any_order',
            'view_product', 'view_any_product', 'create_product', 'update_product', 'delete_product', 'delete_any_product',
            'view_payment', 'view_any_payment', 'create_payment', 'update_payment', 'delete_payment', 'delete_any_payment',
            'view_pay_method', 'view_any_pay_method', 'create_pay_method', 'update_pay_method', 'delete_pay_method', 'delete_any_pay_method'
        ]);
        
        $customer->givePermissionTo([
            'view_order', 'view_product', 'view_category',
            'view_any_order', 'view_any_product', 'view_any_category',
            'create_order', 'view_payment', 'view_any_payment',
            'create_payment', 'view_pay_method', 'view_any_pay_method'
        ]);
    }
}