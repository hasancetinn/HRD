<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(
    \App\Order::class,
    function (Faker $faker) {
        return [
            'productId' => $faker->numberBetween(10000, 9999),
            'orderCode' => $faker->unique()->numerify('########'),
            'quantity' => 1,
            'address' => $faker->address,
            'shippingDate' => $faker->date(),
        ];
    }
);
