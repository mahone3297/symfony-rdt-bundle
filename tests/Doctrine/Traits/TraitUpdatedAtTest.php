<?php declare(strict_types=1);

namespace Mahone\Tests\Doctrine\Traits;

use Mahone\Tests\TestCase;
use Mahone\Doctrine\Traits\TraitUpdatedAt;

class UserUpdatedAt
{
    use TraitUpdatedAt;
}

class TraitUpdatedAtTest extends TestCase
{
    public function testTraitUpdatedAtTest()
    {
        $u = new UserUpdatedAt();
        $this->assertEquals(null, $u->getUpdatedAt());
        $u->setUpdatedAt(new \DateTime());
        $this->assertInstanceOf('DateTime', $u->getUpdatedAt());
    }
}