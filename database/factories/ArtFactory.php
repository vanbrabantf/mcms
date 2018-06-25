<?php

use Domain\Art;
use Faker\Generator as Faker;

$factory->define(Art::class, function (Faker $faker) {
    return [
        'name' => $faker->domainWord,
        'image' => $faker->image(),
        'description' => $faker->realText(),
    ];
});
