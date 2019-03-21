<?php

use Faker\Generator as Faker;

$factory->define(App\Especialidade::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
    ];
});
