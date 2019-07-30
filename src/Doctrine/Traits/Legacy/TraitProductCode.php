<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait TraitProductCode
{
    /**
     * 产品编码
     * @ORM\Column(name="productCode", type="string", length=50)
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=50)
     */
    private $productCode = '';

    /**
     * Set productCode
     *
     * @param string $productCode
     */
    public function setProductCode(string $productCode)
    {
        $this->productCode = $productCode;
        return $this;
    }

    /**
     * Get productCode
     *
     * @return string
     */
    public function getProductCode(): string
    {
        return $this->productCode;
    }
}