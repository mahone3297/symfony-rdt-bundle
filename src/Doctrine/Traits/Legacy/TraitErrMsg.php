<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

Trait TraitErrMsg
{
    /**
     * 错误信息
     * @ORM\Column(name="errMsg", type="text")
     */
    private $errMsg = '';

    /**
     * Set errMsg
     *
     * @param string $errMsg
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;

        return $this;
    }

    /**
     * Get errMsg
     *
     * @return string
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }
}
