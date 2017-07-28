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

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fr_FR'); // create a French faker

    return [
        'association_id' => $faker->numberBetween($min = 1, $max = 5),
        'categorie_id' => $faker->numberBetween($min = 1, $max = 5),
        'titre' => $faker->word,
        'texte' => $faker->paragraphs($nb = 4, $asText = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'created_at' => $faker->dateTime,
    ];
});

