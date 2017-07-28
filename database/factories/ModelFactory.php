<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Evenement::class, function (Faker\Generator $faker) {

    return [
		'association_id' => 0,
		'categorie_id' => 0,
		'titre' => $faker->name,
		'lieu' => $faker->streetName,
		'dateDeb' => $faker->dateTime(),
		'heureDeb' => '08:00',
		'dateFin' => $faker->dateTime(),
		'heureFin' => '18:00',
		'prix' => $faker->numberBetween(0,70),
		'tarifs' => '3$ La pinte, 4$ Mojito et le pastaga 2$',
		'description' => $faker->text(200),
		'affiche' => '',
		'nbMaxParticipants'=> $faker->numberBetween(0,50) ,
    ];
});


