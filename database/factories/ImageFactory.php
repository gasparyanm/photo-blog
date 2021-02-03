<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker, $attributes = []) {
    $user_id = isset($attributes['user_id']) ? $attributes['user_id'] : null;

    return [
        'title' => $faker->text(15),
        'path' => $faker->imageUrl(50,50),
        'user_id' => $user_id
    ];
});
