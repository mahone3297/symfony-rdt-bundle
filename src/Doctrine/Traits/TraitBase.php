<?php

namespace Mahone\Doctrine\Traits;

use Doctrine\ORM\Mapping as ORM;

Trait TraitBase
{
    use TraitId;
    use TraitCreatedAt;
    use TraitUpdatedAt;
}
