<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait TraitPlatformOrderId
{
    /**
     * @ORM\Column(name="platformOrderId", type="string", length=30)
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=30)
     */
    private $platformOrderId;

    /**
     * Set platformOrderId
     *
     * @param string $platformOrderId
     */
    public function setPlatformOrderId($platformOrderId)
    {
        $this->platformOrderId = $platformOrderId;

        return $this;
    }

    /**
     * Get platformOrderId
     *
     * @return string 
     */
    public function getPlatformOrderId()
    {
        return $this->platformOrderId;
    }
}