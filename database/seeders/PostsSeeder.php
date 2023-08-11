<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;


class PostsSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        // использовать метод create() и $faker
        Post::create([
            'content' => $faker->text,
            'created_at' => $faker->dateTime(),
            'user_id' => rand(1,50),
            'img' => 'images/avatar/'.'0'.rand(1,9).'.jpg'
        ]);
    }
}

