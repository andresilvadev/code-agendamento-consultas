<?php

use Faker\Generator as Faker;

$factory->define(App\Paciente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cpf' => $faker->randomNumber(),
        'rua' => $faker->streetName,
        'numero' => $faker->buildingNumber,
        'cep' => $faker->postcode,
        'bairro' => $faker->cityPrefix,
        'cidade' => $faker->city,
        'estado' => $faker->state,
        'pais' => 'Brasil',
        'telefone_fixo' => $faker->tollFreePhoneNumber,
        'telefone_celular' => $faker->tollFreePhoneNumber,
        'e_mail' => $faker->email,
        'observacoes' => $faker->text(100),
        //'medico_id' => $faker->numberBetween(1,15),
    ];
});