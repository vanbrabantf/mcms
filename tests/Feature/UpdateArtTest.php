<?php

namespace Tests\Feature;

use Domain\Art;
use Domain\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class UpdateArtTest extends TestCase
{
    use RefreshDatabase;

    public function testCanUpdateArt(): void
    {
        $this->actingAs(factory(User::class)->create(), 'api');
        $art = factory(Art::class)->create();

        $response = $this->put('/api/art/' . $art->getId(), [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);
    }

    public function testCantUpdateArtThatDoesntExist(): void
    {
        $this->actingAs(factory(User::class)->create(), 'api');

        $response = $this->put('/api/art/' . 'fakeUuid', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);

        $response->assertStatus(422);
        $this->assertDatabaseMissing('art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);
    }

    public function testNeedToBeLoggedInToUpdate(): void
    {
        $art = factory(Art::class)->create();
        $response = $this->put('/api/art/' . $art->getId(), [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);
    }

    public function invalidData()
    {
        return [
            [
                [
                    'name' => 1,
                    'description' => 1
                ],
                [
                    'name' => 'title',
                ],
                [
                    'description' => 'description'
                ],
            ],
        ];
    }

    /**
     *
     * @dataProvider invalidData
     * @return void
     */
    public function testCantUpdateWithInvalidData($testData): void
    {
        $art = factory(Art::class)->create();
        $this->actingAs(factory(User::class)->create(), 'api');

        $response = $this->put('/api/art/' . $art->getId(), $testData);

        $response->assertStatus(422);
        $this->assertDatabaseMissing('art', $testData);
    }
}