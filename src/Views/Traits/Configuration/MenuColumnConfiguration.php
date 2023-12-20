<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Configuration;

trait MenuColumnConfiguration
{
    public function actions(array $actions): self
    {
        $this->actions = $actions;

        return $this;
    }
}
