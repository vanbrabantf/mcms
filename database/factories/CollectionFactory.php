<?php

use Domain\Art;
use Domain\Entities\Collection;
use Faker\Generator as Faker;

$factory->define(Collection::class, function (Faker $faker) {
    return [
        'name' => $faker->domainWord,
        'description' => $faker->realText(),
        'art_id' => factory(Art::class)->create()->id,
    ];
});
