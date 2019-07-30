<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

Trait TraitBatchNumber
{
    /**
     * 批次号
     * @ORM\Column(name="batchNumber", type="string", length=20)
     */
    private $batchNumber = '';

    /**
     * Set batchNumber
     *
     * @param string $batchNumber
     *
     * @return ShipmentLine
     */
    public function setBatchNumber($batchNumber)
    {
        $this->batchNumber = $batchNumber;

        return $this;
    }

    /**
     * Get batchNumber
     *
     * @return string
     */
    public function getBatchNumber()
    {
        return $this->batchNumber;
    }
}