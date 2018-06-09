<?php

use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => function (array $user) {
                    return str_slug($user['name']);
                },
        'email' => $faker->unique()->safeEmail,
        'image' => '',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

// App\User::all()->each(function ($user) use ($users) { 
//     $user->friends()->attach(
//         $users->random(rand(1, App\User::max('id')))->pluck('id')->toArray()
//     ); 
// });