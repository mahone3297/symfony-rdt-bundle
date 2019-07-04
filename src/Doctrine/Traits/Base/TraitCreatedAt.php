<?php

namespace Mahone\Doctrine\Traits\Base;

use Doctrine\ORM\Mapping as ORM;

Trait TraitCreatedAt
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\PreFlush
     */
    public function preFlushCreatedAt()
    {
        if (null == $this->getCreatedAt())
            $this->setCreatedAt(new \DateTime());
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
