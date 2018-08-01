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

$factory->define(App\Users::class, function (Faker $faker) {
    return [
        'name' => "admin".rand(0,255),
        'email' => "admin".rand(0,2424)."@admin.com",
        'password' => bcrypt(123),
        'active' => 1
    ];
});

$factory->define(App\Libraries::class, function (Faker $faker) {
    return [
        'name' => "Fazıl Say".rand(0,10),
        'description' => "Merhaba Dünya".rand(0,10),
        'slug' => str_slug("Fazıl Say".rand(0,10)),
        'status' => "a",
        'hit' => 0,
        'sort_order' => 0,
    ];
});

$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'name' => "Fazıl Say".rand(0,10),
        'slug' => str_slug("Fazıl Say".rand(0,10)),
        'status' => "a",
        'hit' => 0,
        'sort_order' => 0,
        'libraries_id' => rand(0,100),
    ];
});