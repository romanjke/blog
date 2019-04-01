<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'post_id' => function () {
            return App\Post::inRandomOrder()->first();
        },
        'user_id' => function () {
            return App\User::inRandomOrder()->first();
        }
    ];
});
