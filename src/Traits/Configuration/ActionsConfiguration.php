<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait ActionsConfiguration
{
    /**
     * @param  array  $actions
     *
     * @return $this
     */
    public function setActions(array $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @param  bool  $status
     *
     * @return $this
     */
    public function setActionsStatus(bool $status): self
    {
        $this->actionsStatus = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setActionsEnabled(): self
    {
        $this->setActionsStatus(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function setActionsDisabled(): self
    {
        $this->setActionsStatus(false);

        return $this;
    }
}
