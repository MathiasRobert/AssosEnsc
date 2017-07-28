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
// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

use App\CategorieEvenement;
use App\CategorieArticle;

$factory->define(App\Evenement::class, function (Faker\Generator $faker) {

	$faker->locale('fr_FR');

	$categorieEvenementRandom = CategorieEvenement::orderBy(DB::raw('RAND()'))->first();

    return [
		'association_id' => 0, // redefinis Dans EvenementsTableSeederSeeder
		'categorie_id' => $categorieEvenementRandom->id,
		'titre' => $faker->name,
		'lieu' => $faker->streetName,
		'dateDeb' => $faker->dateTime(),
		'heureDeb' => '08:00',
		'dateFin' => $faker->dateTime(),
		'heureFin' => '18:00',
		'prix' => $faker->numberBetween(0,70),
		'tarifs' => '3$ La pinte, 4$ Mojito et le pastaga 2$',
		'description' => $faker->text(200),
		'affiche' => $faker->imageUrl($width = 640, $height = 480),
		'nbMaxParticipants'=> $faker->numberBetween(0,50) ,
    ];
});


$factory->define(App\Article::class, function (Faker\Generator $faker) {
    // $faker = Faker\Factory::create('fr_FR'); // create a French faker

	$faker->locale('fr_FR');

    $categorieArticleRandom = CategorieArticle::orderBy(DB::raw('RAND()'))->first();

    return [
        'association_id' => 0,// redefini Dans ArticlesTableSeeder,
        'categorie_id' => $categorieArticleRandom->id,
        'titre' => $faker->word,
        'texte' => $faker->paragraphs($nb = 4, $asText = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'created_at' => $faker->dateTime,
    ];
});