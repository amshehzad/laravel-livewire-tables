<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Views\Columns\MenuItem;

trait MenuColumnHelpers
{
    public function getView(): string
    {
        return $this->view;
    }

    public function getActions(): array
    {
        return collect($this->actions)
            ->reject(fn ($action) => ! $action instanceof MenuItem)
            ->toArray();
    }
}
