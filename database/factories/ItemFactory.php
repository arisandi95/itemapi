<?php

use Faker\Generator as Faker;

$factory->define(\App\Item::class, function (Faker $faker) {
    return [
        'text' => $faker->unique()->city(),
        'body' => $faker->name,
    ];
});

