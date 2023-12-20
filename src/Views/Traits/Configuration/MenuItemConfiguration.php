<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Configuration;

use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;

trait MenuItemConfiguration
{
    public function permission(callable $callback): self
    {
        $this->permissionCallback = $callback;

        return $this;
    }

    public function visible(callable $callback): self
    {
        $this->visibleCallback = $callback;

        return $this;
    }

    public function icon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function form(string $method = 'post'): self
    {
        $this->form = true;
        $this->method = $method;

        return $this;
    }

    public function method(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function divider($position = 'after'): self
    {
        if (! in_array($position, ['after', 'before'])) {
            throw new DataTableConfigurationException("Divider position can either 'before' or 'after'");
        }

        $this->divider = true;

        $this->dividerPosition = $position;

        return $this;
    }

    public function dividerPosition(): string
    {
        return $this->dividerPosition;
    }

    public function hasDivider(): bool
    {
        return $this->divider == true;
    }
}
