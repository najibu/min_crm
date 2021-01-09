<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'client_id' => factory(Client::class)->create(),
        'transaction_date' => $faker->date,
        'amount' => $faker->numberBetween($min = 1000, $max = 7000),
    ];
});
