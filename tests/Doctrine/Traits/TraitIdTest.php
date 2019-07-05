<?php declare(strict_types=1);

namespace Mahone\Tests\Doctrine\Traits;

use Mahone\Tests\TestCase;
use Mahone\Doctrine\Traits\TraitId;

class UserId
{
    use TraitId;
}

class TraitIdTest extends TestCase
{
    public function testTraitId()
    {
        $u = new UserId();
        $this->assertObjectHasAttribute('id', $u);
        $this->assertEquals(null, $u->getId());
    }
}