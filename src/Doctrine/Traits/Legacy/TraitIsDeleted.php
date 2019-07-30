<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

Trait TraitIsDeleted
{
    /**
     * @var bool
     *
     * @ORM\Column(name="isDeleted", type="boolean")
     */
    protected $isDeleted = false;

    /**
     * Set isDeleted.
     *
     * @param bool $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }
}
