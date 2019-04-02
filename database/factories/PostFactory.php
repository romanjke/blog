<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => substr($faker->realText($maxNbChars = 50, $indexSize = 2), 0, -1),
        'content' => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        'user_id' => function () {
            return App\User::whereIn('role_id', [1, 2])->inRandomOrder()->first()->id;
        }
    ];
});