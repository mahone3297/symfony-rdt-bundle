<?php

namespace Mahone\Doctrine\Traits\Legacy;

Trait TraitRepeatableWithErrMsg
{
    use TraitRepeatable;
    use TraitErrMsg;

    public function processWithErrMsg(bool $isProcessed, string $errMsg = '')
    {
        $this->process($isProcessed);
        $this->setErrMsg($errMsg);
    }

}