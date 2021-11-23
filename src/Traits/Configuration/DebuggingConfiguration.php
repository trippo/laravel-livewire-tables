<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait DebuggingConfiguration
{
    /**
     * @param  bool  $status
     *
     * @return $this
     */
    public function setDebugStatus(bool $status): self
    {
        $this->debugStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDebugEnabled(): self
    {
        return $this->setDebugStatus(true);
    }

    /**
     * @return $this
     */
    public function setDebugDisabled(): self
    {
        return $this->setDebugStatus(false);
    }

    /**
     * @return bool
     */
    public function getDebugStatus(): bool
    {
        return $this->debugStatus;
    }
}
