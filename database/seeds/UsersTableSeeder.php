<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::truncate();

        Role::truncate();
        User::truncate();

        $adminRole= Role::create(['name' => 'Admin']);
        $writerRole= Role::create(['name' => 'Writer']);
        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

       $viewRolesPermission = Permission::create(['name' => 'View roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles']);




        $admin=new User;
        $admin->name = 'Krizto';
        $admin->email = 'jkmurillo93@gmail.com';
        $admin->password='gogeta';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer=new User;
        $writer->name = 'Paty Palacios';
        $writer->email = 'patyv@gmail.com';
        $writer->password='gogeta';
        $writer->save();
        $writer->assignRole($writerRole);

    }
}
