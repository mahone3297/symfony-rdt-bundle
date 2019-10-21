<?php

namespace Mahone\Tests\Doctrine\Traits\Legacy;

use Mahone\Doctrine\Traits\Legacy\TraitProductCode;
use Mahone\Doctrine\Traits\Legacy\TraitProductName;
use Mahone\Doctrine\Traits\TraitBase;
use Mahone\Tests\TestCase;

class Product
{
    use TraitBase;
    use TraitProductName;
}


class TraitProductNameTest extends TestCase
{
    public function testProduct()
    {
        $product = new Product();
        $product->setName("avc\ndwa\rdwdw\n\r,\r\n.");

        $this->assertEquals('avcdwadwdw,.', $product->getName());
    }
}