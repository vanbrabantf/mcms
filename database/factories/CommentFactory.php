<?php

use Domain\Art;
use Domain\Entities\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
        return [
            'name' => $faker->domainWord,
            'body' => $faker->text(),
            'art_id' => factory(Art::class)->create()->id,
        ];
});
