<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('posts')->delete();
 
        $posts = array(
            ['id' => 1, 'content' => 'content content content content content  1', 'slug' => 'post-1', 'user_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'content' => 'Projecontencontent content content content content content t ct 2', 'slug' => 'post-2', 'user_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'content' => 'Projcontent content content content content content content content content ect 3', 'slug' => 'post-3', 'user_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
    }
}
