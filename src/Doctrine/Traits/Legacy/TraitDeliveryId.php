<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

trait TraitDeliveryId
{
    /**
     * 快递单号
     * @ORM\Column(name="deliveryId", type="string", length=30)
     */
    private $deliveryId = '';

    /**
     * @return mixed
     */
    public function getDeliveryId()
    {
        return $this->deliveryId;
    }

    /**
     * @param mixed $deliveryId
     */
    public function setDeliveryId($deliveryId)
    {
        if (!preg_match('/[a-zA-Z0-9]+/', $deliveryId))
            throw new \Exception('快递单号格式错误，仅支持英文字母和数字，请检查');
        $this->deliveryId = $deliveryId;
        return $this;
    }
}