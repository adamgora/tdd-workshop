<?php

use App\Make;
use Faker\Generator as Faker;

$factory->define(Make::class, function (Faker $faker) {
    $makes = ['Skoda', 'Ferrar', 'Renault', 'Ford'];
    return [
        'name' => $faker->randomElement($makes)
    ];
});
