<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;


        class UserSeeder extends Seeder
        {
            public function run(Faker $faker)
            {
                // использовать метод create() и $faker
                User::create([
                    'name' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'birthday' => $faker->date('Y-m-d'),
                    'about' => $faker->text(),
                    'img' => 'images/avatar/'.'0'.rand(1,9).'.jpg',
                    'email' => $faker->unique()->safeEmail,
                    'created_at' => $faker->unixTime(),
                    'password' => '$2y$10$kb/X.mLXNEJ5KtEMA3mmAewzG0CVXMd1GYqYQmbAY34s5PUwpTHy6'
                ]);
            }
        }

