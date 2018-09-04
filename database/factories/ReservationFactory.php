<?php

use App\Car;
use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'customer_id' => factory('App\Customer')->create()->id,
        'car_id' => Car::all()->random()->id,
        'status' => $faker->randomDigit(0, 3),
        'from' => $faker->dateTimeBetween('-2 days', 'now')->format('Y-m-d'),
        'to' => $faker->dateTimeBetween('now', '+2 days')->format('Y-m-d'),
        'total_cost' => $faker->randomFloat(2, 100, 1000),
        'contract_url' => ''
    ];
});
