<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

trait MenuItemHelpers
{
    public function getPermissionCallback(): ?callable
    {
        return $this->permissionCallback;
    }

    public function hasPermissionCallback(): bool
    {
        return $this->permissionCallback !== null;
    }

    public function getVisibleCallback(): ?callable
    {
        return $this->visibleCallback;
    }

    public function hasVisibleCallback(): bool
    {
        return $this->visibleCallback !== null;
    }

    public function getView(): string
    {
        return $this->view;
    }
}
