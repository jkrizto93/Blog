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




        $admin=new User;
        $admin->name = 'Krizto';
        $admin->email = 'jkmurillo93@gmail.com';
        $admin->password=bcrypt('gogeta');
        $admin->save();

        $admin->assignRole($adminRole);

        $writer=new User;
        $writer->name = 'Paty Palacios';
        $writer->email = 'patyv@gmail.com';
        $writer->password=bcrypt('gogeta');
        $writer->save();
        $writer->assignRole($writerRole);

    }
}
