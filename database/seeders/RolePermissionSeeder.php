<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Permission::create(['name'=>'add-user']);
        // Permission::create(['name'=>'edit-user']);
        // Permission::create(['name'=>'add-product']);
        // Permission::create(['name'=>'edit-product']);

        // Role::create(['name'=>'master']);
        // Role::create(['name'=>'admin']);

        // $roleMaster = Role::findByName('master');
        // $roleMaster->givePermissionTo('add-user');
        // $roleMaster->givePermissionTo('edit-user');

        // $roleAdmin = Role::findByName('admin');
        // $roleAdmin->givePermissionTo('add-produk');
        // $roleAdmin->givePermissionTo('edit-produk');
    }
}
