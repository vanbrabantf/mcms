<?php

namespace Tests\Unit\domain\Art;

use Domain\Art\ArtId;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Tests\TestCase;

class ArtIdTest extends TestCase
{
    public function testCanCreateUUid()
    {
        $stringId = 'c6698c49-e9e4-4caf-b166-38f284e69f65';
        $id = new ArtId($stringId);
        $this->assertEquals($id, $stringId);
    }

    public function testCanGetUUidFromVo()
    {
        $stringId = 'c6698c49-e9e4-4caf-b166-38f284e69f65';
        $id = new ArtId($stringId);
        $this->assertEquals($id->getId(), $stringId);
    }

    public function testCantCreateInvalidUUid()
    {
        $this->expectException(InvalidUuidStringException::class);

        $stringId = 'not an id';
        $id = new ArtId($stringId);
    }
}
