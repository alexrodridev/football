<?php

use Faker\Generator as Faker;

$factory->define(App\Seguidores::class, function (Faker $faker) {
    return [
    	'user_id' => $faker->numberBetween($min = 1, $max = 20),
    	'followed_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
