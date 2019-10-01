<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = [
            'name' => 'Yetim',
            'password' => bcrypt('password'),
            'email'=> 'yetimnew@gmail.com',
            'type'=>'admin'
        ];
        $user2 = [
            'name' => 'Yetim',
            'password' => bcrypt('password'),
            'email'=> 'user@gmail.com',
            'type'=>'user'
        ];
       User::create($user1);
       User::create($user2);
    }
}
