<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait TraitBarcode
{
    /**
     * 产品条形码
     * @ORM\Column(name="barcode", type="string", length=30)
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=30)
     */
    private $barcode = '';

    /**
     * Set barcode
     *
     * @param string $barcode
     */
    public function setBarcode(string $barcode)
    {
        $this->barcode = $barcode;
        return $this;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }
}