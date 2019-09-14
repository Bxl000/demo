<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Home\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text,
        'tag' => $faker->hexcolor,
        'author' => $faker->firstNameMale,
        'viewnumber' => $faker->randomDigit,
    ];
});
