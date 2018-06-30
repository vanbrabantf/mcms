<?php

namespace Tests\Feature;

use Domain\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateNewArtTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateArt(): void
    {
        $this->actingAs(factory(User::class)->create(), 'api');

        $response = $this->post('/api/art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);
    }

    public function testNeedToBeLoggedInToCreate(): void
    {
        $response = $this->post('/api/art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('art', [
            'name' => '1989',
            'description' => '1989 is the fifth studio album by American singer-songwriter Taylor Swift, released on October 27, 2014 through Big Machine Records.',
        ]);
    }

    public function invalidData() {
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
    public function testCantCreateWithInvalidData($testData): void
    {
        $this->actingAs(factory(User::class)->create(), 'api');

        $response = $this->post('/api/art', $testData);

        $response->assertStatus(422);
        $this->assertDatabaseMissing('art', $testData);
    }
}
