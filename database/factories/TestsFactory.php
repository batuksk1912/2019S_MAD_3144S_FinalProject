<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tests;
use Faker\Generator as Faker;

$factory->define(Tests::class, function (Faker $faker) {
    return [
        'name' => rtrim($faker->sentence(4),'.'),
        'description' => $faker->realText(rand(40, 100)),
        'is_active'  => 1,
        'passing_score' => rand(15,20),
        'user_id' => function () {
            // Get random genre id
            return App\User::inRandomOrder()->first()->id;
        },

    ];
});
//php artisan make:factory QuestionsFactory --model=Questions