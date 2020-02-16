<?php

namespace Mahone\Tests\Doctrine\Traits\Legacy;

use Mahone\Doctrine\Traits\Legacy\TraitDeliveryId;
use Mahone\Tests\TestCase;

class DeliveryId
{
    use TraitDeliveryId;
}


class TraitDeliveryIdTest extends TestCase
{
    public function testDeliveryId()
    {
        $d = new DeliveryId();
        $d->setDeliveryId('SF1007659904056');
        $this->assertEquals('SF1007659904056', $d->getDeliveryId());

        $d->setDeliveryId('sf1007659904056');
        $this->assertEquals('sf1007659904056', $d->getDeliveryId());

        $d->setDeliveryId('016278040550');
        $this->assertEquals('016278040550', $d->getDeliveryId());

        $this->expectException(\Exception::class);
        $d->setDeliveryId('ＳＦ３４２５４１５４３４');
    }
}