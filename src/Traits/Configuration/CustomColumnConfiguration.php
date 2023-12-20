<?php

namespace Rappasoft\LaravelLivewireTables\Traits\Configuration;

trait CustomColumnConfiguration
{
    public function from(callable $callback): self
    {
        return $this->label($callback);
    }
}
