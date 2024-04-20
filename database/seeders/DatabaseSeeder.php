<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Creating SuperAdmin User
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'super@admin.com';
        $user->password = bcrypt('password');
        $user->save();


        //Creating Role
        $role = Role::create([
            'name' => 'Super Admin'
        ]);

        //Create Permission
        $permission = Permission::create([
            'name' => 'create-admin'
        ]);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

    }
}
