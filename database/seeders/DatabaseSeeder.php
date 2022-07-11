<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Article::factory()->count(20)->create();
        Comment::factory()->count(50)->create();

        User::factory()->create([
            'name' => 'UserOne',
            'email' => 'Userone@gmail.com'
        ]);
        User::factory()->create([
            'name' => 'UserTwo',
            'email' => 'Usertwo@gmail.com'
        ]);
        User::factory()->create([
            'name' => 'UserThree',
            'email' => 'Userthree@gmail.com'
        ]);
        User::factory()->create([
            'name' => 'UserFour',
            'email' => 'Userfour@gmail.com'
        ]);

        Category::factory()->create([
                'name' => 'Ecudation'
        ]);
        Category::factory()->create([
            'name' => 'Funny'
        ]);
        Category::factory()->create([
            'name' => 'For You'
         ]);
         Category::factory()->create([
            'name' => 'News'
        ]);

      //  Like::factory()->count(100)->create();

    }
}
