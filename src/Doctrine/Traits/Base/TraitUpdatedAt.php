<?php

namespace Mahone\Doctrine\Traits\Base;

use Doctrine\ORM\Mapping as ORM;

Trait TraitUpdatedAt
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Test
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
