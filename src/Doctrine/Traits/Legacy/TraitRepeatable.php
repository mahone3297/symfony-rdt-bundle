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

        /**
            遵循逻辑
            前多少时间/重试延后时间 总的重试次数累加
            15m/1m  15次
            1h/3m   30次
            2h/5m   42次
            6h/10m  66次
            1d/1h   84次
            3d/3h   100次
            7d/8h   112次
            7d+/12h  112次+
         */
        if ( ! $isProcessed) {
            if ($tryTimes < 15) {
                $delayTime = '+1 min';
            } elseif ($tryTimes < 30) {
                $delayTime = '+3 min';
            } elseif ($tryTimes < 42) {
                $delayTime = '+5 min';
            } elseif($tryTimes < 66) {
                $delayTime = '+10 min';
            } elseif ($tryTimes < 84) {
                $delayTime = '+1 hour';
            } elseif ($tryTimes < 100) {
                $delayTime = '+3 hour';
            } elseif ($tryTimes < 112) {
                $delayTime = '+8 hour';
            } else {
                $delayTime = '+12 hour';
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