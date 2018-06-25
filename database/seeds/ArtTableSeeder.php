<?php

use Domain\Art;
use Domain\Entities\Collection;
use Domain\Entities\Comment;
use Illuminate\Database\Seeder;

class ArtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Art::class, 10)->create()->each(function (Art $u) {
            $u->collection()->save(factory(Collection::class)->make());
            factory(Comment::class, 10)->create(
                [
                    'art_id' => $u->id,
                ]
            );
        });
    }
}
