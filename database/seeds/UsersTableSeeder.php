<?php

use Illuminate\Database\Seeder;
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
        User::truncate();

        $user=new User;
        $user->name = 'Krizto';
        $user->email = 'jkmurillo93@gmail.com';
        $user->password=bcrypt('gogeta');
        $user->save();
    }
}
