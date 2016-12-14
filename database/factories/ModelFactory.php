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
        'cell' => $faker->phoneNumber
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'location_name' => $faker->word(),
        'location_number' => $faker->randomNumber(),
        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'state' => $faker->state(),
        'zip' => $faker->postcode(),
        'contact' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->email(),
        'cell' => $faker->phoneNumber(),
        'location_notes' => $faker->sentence(),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->word(),
        'location_number' => $faker->randomNumber(),
        'address' => $faker->streetAddress(),
        'city' => $faker->city(),
        'state' => $faker->state(),
        'zip' => $faker->postcode(),
        'fax' => $faker->phoneNumber(),
        'name_1' => $faker->name(),
        'phone_1' => $faker->phoneNumber(),
        'email_1' => $faker->email(),
		'name_2' => $faker->name(),
        'phone_2' => $faker->phoneNumber(),
        'email_2' => $faker->email(),
        'name_3' => $faker->name(),
        'phone_3' => $faker->phoneNumber(),
        'email_3' => $faker->email(),
        'name_4' => $faker->name(),
        'phone_4' => $faker->phoneNumber(),
        'email_4' => $faker->email(),
		'internal_notes' => $faker->sentence(),
    ];
});

