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
        //Admin
        User::create([
          'name' => 'Armando',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('123123'),
          'rol' => '0',
        ]);
        //Support
        User::create([
          'name' => 'Maria',
          'email' => 'support@gmail.com',
          'password' => bcrypt('123123'),
          'rol' => '1',
        ]);
        //Client
        User::create([
          'name' => 'Claudia',
          'email' => 'cliente@gmail.com',
          'password' => bcrypt('123123'),
          'rol' => '2',
        ]);
    }
}
