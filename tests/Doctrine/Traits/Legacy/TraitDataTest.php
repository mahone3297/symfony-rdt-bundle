<?php

namespace Mahone\Tests\Doctrine\Traits\Legacy;

use Mahone\Doctrine\Traits\Legacy\TraitBarcode;
use Mahone\Doctrine\Traits\Legacy\TraitBatchNumber;
use Mahone\Doctrine\Traits\Legacy\TraitFlavor;
use Mahone\Doctrine\Traits\Legacy\TraitInOutMonitor;
use Mahone\Doctrine\Traits\Legacy\TraitPlatformOrderId;
use Mahone\Doctrine\Traits\Legacy\TraitProductCode;
use Mahone\Doctrine\Traits\Legacy\TraitProductName;
use Mahone\Doctrine\Traits\Legacy\TraitWeight;
use Mahone\Doctrine\Traits\TraitBase;
use Mahone\Tests\TestCase;

class DataUser
{
    use TraitBase;
    use TraitBarcode;
    use TraitBatchNumber;
    use TraitInOutMonitor;
    use TraitFlavor;
    use TraitPlatformOrderId;
    use TraitProductCode;
    use TraitProductName;
    use TraitWeight;
}


class TraitDataTest extends TestCase
{
    public function testAttributes()
    {
        $dataUser = new DataUser();
        $this->assertObjectHasAttribute('id', $dataUser);
        $this->assertObjectHasAttribute('barcode', $dataUser);
        $this->assertObjectHasAttribute('batchNumber', $dataUser);
        $this->assertObjectHasAttribute('inErrorMsg', $dataUser);
        $this->assertObjectHasAttribute('outErrorMsg', $dataUser);
        $this->assertObjectHasAttribute('inUpdateTime', $dataUser);
        $this->assertObjectHasAttribute('outUpdateTime', $dataUser);
        $this->assertObjectHasAttribute('confirmLog', $dataUser);
        $this->assertObjectHasAttribute('flavor', $dataUser);
        $this->assertObjectHasAttribute('platformOrderId', $dataUser);
        $this->assertObjectHasAttribute('productCode', $dataUser);
        $this->assertObjectHasAttribute('name', $dataUser);
        $this->assertObjectHasAttribute('weight', $dataUser);
    }

    public function testFunctions()
    {
        $dataUser = new DataUser();
        $dataUser->setBarcode('XXX0001AAA');
        $dataUser->setBatchNumber('A10000000');
        $dataUser->setInErrorMsg('InErrorMsg');
        $dataUser->setOutErrorMsg('OutErrorMsg');
        $dataUser->setInUpdateTime(new \DateTime());
        $dataUser->setOutUpdateTime(new \DateTime());
        $dataUser->setConfirmLog('log');
        $dataUser->setFlavor('abc');
        $dataUser->setPlatformOrderId('100002');
        $dataUser->setProductCode('SKU0001');
        $dataUser->setWeight(10.001);
        $this->assertEquals('SKU0001', $dataUser->getProductCode());
        $this->assertEquals(10.001, $dataUser->getWeight());
    }
}