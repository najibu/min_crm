<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    $path = storage_path('app/public');

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'avatar' => $faker->image($path, 100, 100),
        'email' => $faker->unique()->safeEmail,
    ];
});
