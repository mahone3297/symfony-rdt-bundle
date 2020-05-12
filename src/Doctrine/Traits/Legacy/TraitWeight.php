<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

Trait TraitWeight
{
    /**
     * 重量 单位 kg.
     *
     * @ORM\Column(name="weight",  type="decimal", precision=10, scale=3, nullable=true)
     */
    private $weight = 0;

    /**
     * Set weight
     *
     * @param float $weight
     *
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }
}