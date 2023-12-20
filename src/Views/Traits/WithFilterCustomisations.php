<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits;

trait WithFilterCustomisations
{
    public function hideIf($condition): self
    {
        if ($condition) {
            $this->hiddenFromAll();
        }

        return $this;
    }
}
