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
        $this->deliveryId = $deliveryId;
        return $this;
    }
}