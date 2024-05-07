<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Lead;
use App\Models\User;
use App\Models\Course;
use App\Models\Curriculum;
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
        //To create permission name
        $defaultPermission = ['lead-management', 'create-admin', 'user-management'];
        foreach($defaultPermission as $permission) {
            Permission::create(['name' => $permission]);
        }

        //To Create User with Roles
        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
        $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');

        //Lead factory
        Lead::factory()->count(100)->create();

        //Creeate 1 course
         $course = Course::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'description' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $teacher->id,
            'price'=> 500
        ]);

        //Create curriculums
        Curriculum::factory()->count(10)->create();

    }


    private function create_user_with_role($type, $name, $email) {
        //Create Role Name
        $role = Role::create([
            'name' => $type
        ]);

        //Create Users
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        //Give Permission to Roles
        if($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        }elseif($type =='Leads') {
            $role->givePermissionTo('lead-management');
        }

        //Assign Role
        $user->assignRole($role);

        return $user;
    }
}
