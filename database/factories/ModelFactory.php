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

// create fake groups
$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->streetName,
        'slug' => $faker->unique()->slug,
        'created_by' => App\User::all()->random()->id
    ];
});


// create fake posts
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text,
        'user_id' => App\User::all()->random()->id,
        'group_id' => App\Group::all()->random()->id
    ];
});
