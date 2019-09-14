<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thumbnail;
use Faker\Generator as Faker;

$factory->define( \App\Models\Home\Thumbnail::class, function (Faker $faker) {
    return [
        'imgsrc' => $faker->imageUrl(220,120),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date(),
    ];
});
