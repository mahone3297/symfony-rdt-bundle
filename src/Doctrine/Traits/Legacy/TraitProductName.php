<?php

namespace Mahone\Doctrine\Traits\Legacy;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait TraitProductName
{
    /**
     * 产品名.
     *
     * @ORM\Column(name="name", type="string", length=200)
     * @Assert\NotBlank(message="产品名称不能为空！")
     * @Assert\Length(max=200)
     */
    private $name;


    /**
     * Set name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = preg_replace("/[\n|\r]/", '', $name);

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
