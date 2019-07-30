<?php

namespace Mahone\Tests\Doctrine\Traits\Legacy;

use Mahone\Doctrine\Traits\Legacy\TraitIsDeleted;
use Mahone\Doctrine\Traits\Legacy\TraitRepeatableWithErrMsg;
use Mahone\Doctrine\Traits\TraitBase;
use Mahone\Tests\TestCase;

class QueueBetter
{
    use TraitBase;
    use TraitIsDeleted;
    use TraitRepeatableWithErrMsg;
}

class TraitQueueBetterTest extends TestCase
{
    public function testCreateQueueBetter()
    {
        $queueBetter = new QueueBetter();
        $this->assertEquals(false, $queueBetter->getIsDeleted());
        $this->assertEquals(false, $queueBetter->getIsProcessed());
        $this->assertEquals(null, $queueBetter->getNextTriggerAt());
        $this->assertEquals(0, $queueBetter->getTryTimes());
        $this->assertObjectHasAttribute('id', $queueBetter);
        $this->assertObjectHasAttribute('errMsg', $queueBetter);
        $this->assertObjectHasAttribute('createdAt', $queueBetter);
        $this->assertObjectHasAttribute('updatedAt', $queueBetter);
    }

    public function testProcessQueueBetter()
    {
        $queueBetter = new QueueBetter();
        $queueBetter->processWithErrMsg(false, '信息错误');
        $this->assertEquals(false, $queueBetter->getIsDeleted());
        $this->assertEquals(false, $queueBetter->getIsProcessed());
        $this->assertInstanceOf('DateTime', $queueBetter->getNextTriggerAt());
        $this->assertEquals(1, $queueBetter->getTryTimes());
        $this->assertEquals('信息错误', $queueBetter->getErrMsg());

        $queueBetter->processWithErrMsg(true, '');
        $this->assertEquals(false, $queueBetter->getIsDeleted());
        $this->assertEquals(true, $queueBetter->getIsProcessed());
        $this->assertInstanceOf('DateTime', $queueBetter->getNextTriggerAt());
        $this->assertEquals(2, $queueBetter->getTryTimes());
        $this->assertEquals('', $queueBetter->getErrMsg());
    }

}