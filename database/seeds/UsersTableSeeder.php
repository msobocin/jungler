<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        DB::table('users')->delete();

        $users = array(
            ['id' => 1, 'name' => 'admin', 'email' => 'admin@test.pl', 'password' => 'test1234', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'mod', 'email' => 'mod@test.pl', 'password' => 'test1234', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'user', 'email' => 'user@test.pl', 'password' => 'test1234', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
