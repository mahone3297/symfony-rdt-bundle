<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

Trait TraitInOutMonitor
{
    /**
     * @ORM\Column(name="inErrorMsg", type="string", length=250)
     */
    private $inErrorMsg = '';

    /**
     * @ORM\Column(name="outErrorMsg", type="text")
     */
    private $outErrorMsg = '';

    /**
     * @ORM\Column(name="inUpdateTime", type="datetime", nullable=true)
     */
    private $inUpdateTime;

    /**
     * @ORM\Column(name="outUpdateTime", type="datetime", nullable=true)
     */
    private $outUpdateTime;

    /**
     * @ORM\Column(name="confirmLog", type="text")
     */
    private $confirmLog = '';

    
    /**
     * Set inErrorMsg
     *
     * @param string $inErrorMsg
     *
     * @return QimenWmsIncoming
     */
    public function setInErrorMsg($inErrorMsg)
    {
        $this->inErrorMsg = $inErrorMsg;

        return $this;
    }

    /**
     * Get inErrorMsg
     *
     * @return string
     */
    public function getInErrorMsg()
    {
        return $this->inErrorMsg;
    }

    /**
     * Set outErrorMsg
     *
     * @param string $outErrorMsg
     *
     * @return QimenWmsIncoming
     */
    public function setOutErrorMsg($outErrorMsg)
    {
        $this->outErrorMsg = $outErrorMsg;

        return $this;
    }

    /**
     * Get outErrorMsg
     *
     * @return string
     */
    public function getOutErrorMsg()
    {
        return $this->outErrorMsg;
    }

    /**
     * Set inUpdateTime
     *
     * @param \DateTime $inUpdateTime
     *
     * @return QimenWmsIncoming
     */
    public function setInUpdateTime($inUpdateTime)
    {
        $this->inUpdateTime = $inUpdateTime;

        return $this;
    }

    /**
     * Get inUpdateTime
     *
     * @return \DateTime
     */
    public function getInUpdateTime()
    {
        return $this->inUpdateTime;
    }

    /**
     * Set outUpdateTime
     *
     * @param \DateTime $outUpdateTime
     *
     * @return QimenWmsIncoming
     */
    public function setOutUpdateTime($outUpdateTime)
    {
        $this->outUpdateTime = $outUpdateTime;

        return $this;
    }

    /**
     * Get outUpdateTime
     *
     * @return \DateTime
     */
    public function getOutUpdateTime()
    {
        return $this->outUpdateTime;
    }

    /**
     * Set confirmLog
     *
     * @param string $confirmLog
     *
     * @return QimenWmsIncoming
     */
    public function setConfirmLog($confirmLog)
    {
        $this->confirmLog = $confirmLog;

        return $this;
    }

    /**
     * Get confirmLog
     *
     * @return string
     */
    public function getConfirmLog()
    {
        return $this->confirmLog;
    }
}