<?php

namespace Rappasoft\LaravelLivewireTables\Views\Filters;

use DateTime;

class MonthFilter extends DateFilter
{
    public string $view = 'livewire-tables::components.tools.filters.month';

    public function validate(string $value): string|bool
    {
        if (DateTime::createFromFormat('Y-m', $value) === false) {
            return false;
        }

        return $value;
    }

    public function config(array $config = []): DateFilter
    {
        $this->config = [...config('livewire-tables.monthFilter.defaultConfig'), ...$config];

        return $this;
    }

    public function getFilterPillValue($value): ?string
    {
        if ($this->validate($value)) {
            return DateTime::createFromFormat('Y-m', $value)->format($this->getConfig('pillFormat'));
        }

        return null;
    }
}
