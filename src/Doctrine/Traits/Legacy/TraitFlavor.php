<?php

namespace Mahone\Doctrine\Traits\Legacy;

trait TraitFlavor
{
    /**
     * @var string $flavor
     * @ORM\Column(name="flavor", type="string", length=50)
     */
    private $flavor = '';

    /**
     * Set flavor
     *
     * @param string $flavor
     *
     * @return Warehouse
     */
    public function setFlavor($flavor)
    {
        $this->flavor = $flavor;

        return $this;
    }

    /**
     * Get flavor
     *
     * @return string
     */
    public function getFlavor()
    {
        return $this->flavor;
    }
}