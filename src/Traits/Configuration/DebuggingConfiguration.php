<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait DebuggingConfiguration
{
    public function setDebug(bool $status): self
    {
        $this->debug = $status;

        return $this;
    }

    public function setDebugEnabled(): self
    {
        return $this->setDebug(true);
    }

    public function setDebugDisabled(): self
    {
        return $this->setDebug(false);
    }
}
