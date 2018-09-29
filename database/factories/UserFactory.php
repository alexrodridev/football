<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lname' => $faker->lastName,
        'user_name' => $faker->unique()->userName,
        'email' => $faker->unique()->freeEmail,
        'password' => bcrypt('81238174'),
    ];
});
