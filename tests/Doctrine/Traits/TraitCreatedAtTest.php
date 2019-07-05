<?php declare(strict_types=1);

namespace Mahone\Tests\Doctrine\Traits;

use Mahone\Tests\TestCase;
use Mahone\Doctrine\Traits\TraitCreatedAt;

class UserCreatedAt
{
    use TraitCreatedAt;
}

class TraitCreatedAtTest extends TestCase
{
    public function testTraitCreatedAt()
    {
        $u = new UserCreatedAt();
        $this->assertEquals(null, $u->getCreatedAt());
        $u->setCreatedAt(new \DateTime());
        $this->assertInstanceOf('DateTime', $u->getCreatedAt());
    }
}