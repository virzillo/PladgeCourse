<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;



$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'cognome' => $faker->lastName,
        'sesso' => 'maschio',
        'codfiscale' => $faker->word,
        'telefono' => $faker->phoneNumber,
        'cellulare' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password, // secret
        'citta' => $faker->city,
        'data' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'provincia' => $faker->stateAbbr,

        'indirizzo' => $faker->streetAddress,
        'cittadom' => $faker->city,
        'provinciadom' => $faker->stateAbbr,
        'cap' => $faker->postcode,

        'titolostudio' => $faker->word,
        'occupazione' => $faker->word,

        'active' => '0',
        'type' => '0',

        'creator' => '1',

        'created_at' => now(),
    ];
});
