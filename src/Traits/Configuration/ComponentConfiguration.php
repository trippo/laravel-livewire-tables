<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait ComponentConfiguration
{
    /**
     * Get a list of attributes to override on the main wrapper of the component
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setComponentWrapperAttributes(array $attributes = []): self
    {
        $this->componentWrapperAttributes = $attributes;

        return $this;
    }

    /**
     * Get a list of attributes to override on the table element
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setTableAttributes(array $attributes = []): self
    {
        $this->tableAttributes = $attributes;

        return $this;
    }

    /**
     * Get a list of attributes to override on the thead element
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setTheadAttributes(array $attributes = []): self
    {
        $this->theadAttributes = $attributes;

        return $this;
    }

    /**
     * Get a list of attributes to override on the tbody element
     *
     * @return $this
     */
    public function setTbodyAttributes(array $attributes = []): self
    {
        $this->tbodyAttributes = $attributes;

        return $this;
    }

    /**
     * Get a list of attributes to override on the th elements
     *
     * @param  callable  $callback
     *
     * @return $this
     */
    public function setThAttributes(callable $callback): self
    {
        $this->thAttributesCallback = $callback;

        return $this;
    }

    /**
     * Get a list of attributes to override on the td elements
     *
     * @return $this
     */
    public function setTrAttributes(callable $callback): self
    {
        $this->trAttributesCallback = $callback;

        return $this;
    }

    /**
     * Get a list of attributes to override on the td elements
     *
     * @return $this
     */
    public function setTdAttributes(callable $callback): self
    {
        $this->tdAttributesCallback = $callback;

        return $this;
    }

    /**
     * @param  string  $message
     *
     * @return $this
     */
    public function setEmptyMessage(string $message): self
    {
        $this->emptyMessage = $message;

        return $this;
    }

    /**
     * @param  bool  $status
     *
     * @return $this
     */
    public function setOfflineIndicatorStatus(bool $status): self
    {
        $this->offlineIndicator = $status;

        return $this;
    }

    /**
     * @return $this
     */
    public function setOfflineIndicatorEnabled(): self
    {
        $this->setOfflineIndicatorStatus(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function setOfflineIndicatorDisabled(): self
    {
        $this->setOfflineIndicatorStatus(false);

        return $this;
    }
}
