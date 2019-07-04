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
     * @ORM\PreFlush
     */
    public function preFlushUpdatedAt()
    {
        if (null == $this->getUpdatedAt())
            $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdateUpdatedAt()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
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
