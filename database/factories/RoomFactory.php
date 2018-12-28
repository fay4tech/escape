<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'theme' => $faker->text(20),
        'pitch' => $faker->paragraph,
        'minplayers' => $faker->numberBetween(4, 6),
        'maxplayers' => $faker->numberBetween(6, 10),
        'lvl' => $faker->numberBetween(0, 4),
        'success' => $faker->numberBetween(1, 100),
        'timeplay' => $faker->numberBetween(60, 90),
    ];
});
