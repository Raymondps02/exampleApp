<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin Seeder
        $user = User::create([
            'name'=>'masterRole',
            'email'=>'master@gmail.com',
            'password'=>bcrypt('asdasd123'),
            'phone_number'=>'08123123'
        ]);

        $role = Role::create(['name' => 'master']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        
        // $master = User::create([
        //     'name'=>'master',
        //     'email'=>'master@gmail.com',
        //     'password'=>bcrypt('asdasd123'),
        //     'phone_number'=>'08123123'
        // ]);
        // $master->assignRole('master');

        // $admin = User::create([
        //     'name'=>'admin',
        //     'email'=>'admin@gmail.com',
        //     'password'=>bcrypt('asdasd123'),
        //     'phone_number'=>'08123123'
        // ]);
        // $admin->assignRole('admin');
    }
}
