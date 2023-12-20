<?php

namespace Rappasoft\LaravelLivewireTables\Views\Columns\Traits\Configuration;

trait MenuColumnConfiguration
{
    public function actions(array $actions): self
    {
        $this->actions = $actions;

        return $this;
    }
}
