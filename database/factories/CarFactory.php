<?php

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $models = [
        'Turbo',
        'C3',
        'X8'
    ];

    return [
        'make_id' => factory('App\Make')->create()->id,
        'model' => $faker->randomElement($models),
        'registration_number' => $faker->bothify('??#####')
    ];
});
