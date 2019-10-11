<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\QueryBuilder;

Trait TraitRepeatable
{
    /**
     * @var boolean $isProcessed
     *
     * @ORM\Column(name="isProcessed", type="boolean")
     */
    private $isProcessed = false;

    /**
     * @var integer $tryTimes
     *
     * @ORM\Column(name="tryTimes", type="smallint")
     */
    private $tryTimes = 0;

    /**
     * @var \DateTime $nextTriggerAt
     * 下次触发的时间
     *
     * @ORM\Column(name="nextTriggerAt", type="datetime", nullable=true)
     */
    private $nextTriggerAt;

    public static function andWhereUnProcessed(QueryBuilder $qb, string $alias)
    {
        $qb ->andWhere($alias . '.isProcessed = :isProcessed')
            ->setParameter('isProcessed', false)
            ->andWhere($alias . '.nextTriggerAt <= :nextTriggerAt OR ' . $alias . '.nextTriggerAt IS NULL')
            ->setParameter('nextTriggerAt', new \DateTime())
        ;
        return $qb;
    }
    /**
     * Set isProcessed
     *
     * @param boolean $isProcessed
     */
    public function setIsProcessed($isProcessed)
    {
        $this->isProcessed = $isProcessed;
        return $this;
    }

    /**
     * Get isProcessed
     *
     * @return boolean
     */
    public function getIsProcessed()
    {
        return $this->isProcessed;
    }

    public function process($isProcessed)
    {
        $this->setIsProcessed($isProcessed);

        $tryTimes = $this->getTryTimes() + 1;
        $this->setTryTimes($tryTimes);

        if (!$isProcessed) {
            if ($tryTimes < 720) {//前12h按1 min重试
                $delayTime = '+1 min';
            } elseif ($tryTimes < 792) {//前24h按10 min重试,tryTimes继续+12*60/10
                $delayTime = '+10 min';
            } elseif ($tryTimes < 840) {//前3天按1 hour重试，tryTimes继续+2*24/1
                $delayTime = '+1 hour';
            } elseif ($tryTimes < 864) {//前7天按4 hour重试，tryTimes继续+4*24/4
                $delayTime = '+4 hour';
            } else {//超过7天按8 hour重试
                $delayTime = '+8 hour';
            }
            $this->setNextTriggerAt(new \DateTime($delayTime));
        }
    }

    public function processEqualDiff(bool $isProcess, int $min = 15)
    {
        $this->setIsProcessed($isProcess);

        $this->setTryTimes($this->getTryTimes() + 1);
        $this->setNextTriggerAt(new \DateTime('+' . $min . 'min'));
    }

    /**
     * Set tryTimes
     *
     * @param integer $tryTimes
     */
    public function setTryTimes($tryTimes)
    {
        $this->tryTimes = $tryTimes;
        return $this;
    }

    /**
     * Get tryTimes
     *
     * @return integer
     */
    public function getTryTimes()
    {
        return $this->tryTimes;
    }

    /**
     * Set nextTriggerAt
     *
     * @param \DateTime $nextTriggerAt
     */
    public function setNextTriggerAt($nextTriggerAt)
    {
        $this->nextTriggerAt = $nextTriggerAt;
        return $this;
    }

    /**
     * Get nextTriggerAt
     *
     * @return \DateTime
     */
    public function getNextTriggerAt()
    {
        return $this->nextTriggerAt;
    }
}