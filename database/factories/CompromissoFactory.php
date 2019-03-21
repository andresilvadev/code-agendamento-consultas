<?php

use Faker\Generator as Faker;

$factory->define(App\Compromisso::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'start' => $faker->dateTimeThisMonth('now', 'America/Sao_Paulo'),
        'end' => $faker->dateTimeThisMonth('now', 'America/Sao_Paulo'),
    ];
});
