<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'author_post' => $faker->numberBetween($min = 1, $max = 20),
    	'text_post' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
