<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;

Trait TraitIsDeletedUseNegativeId
{
    /**
     * @ORM\Column(name="isDeleted", type="integer")
     */
    private $isDeleted = 0;

    /**
     * Set isDeleted
     *
     * @param bool $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        if ($isDeleted) {
            $this->isDeleted = 0 - $this->id;
        }

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return integer
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }
}