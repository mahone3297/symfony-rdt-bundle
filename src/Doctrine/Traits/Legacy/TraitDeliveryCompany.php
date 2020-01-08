<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

trait TraitDeliveryCompany
{
    /**
     * 快递公司
     * @ORM\Column(name="deliveryCompany", type="string", length=30)
     */
    private $deliveryCompany = '';

    /**
     * @return mixed
     */
    public function getDeliveryCompany()
    {
        return $this->deliveryCompany;
    }

    /**
     * @param mixed $deliveryCompany
     */
    public function setDeliveryCompany($deliveryCompany)
    {
        $this->deliveryCompany = $deliveryCompany;
        return $this;
    }
}