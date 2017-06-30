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
	'path' => $faker->slug,
	'remember_token' => str_random(10),
	];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) use ($factory) {

	return [
	'name' => $faker->name,
	'description' => $faker->text($maxNbChars = 200),
	'price' => $faker->randomNumber(2),
	'category' => $faker->text($maxNbChars = 10),
	'user_id' => $factory->create(App\User::class)->id
	];
});
