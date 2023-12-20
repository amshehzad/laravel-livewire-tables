<?php

namespace Rappasoft\LaravelLivewireTables\Views\Traits\Filters;

trait HasOptions
{
    public array $options = [];

    protected string $firstOption = '';

    public function setFirstOption(string $firstOption = 'All'): self
    {
        $this->firstOption = __($firstOption);

        return $this;
    }

    public function getFirstOption(): string
    {
        return $this->firstOption;
    }

    public function options(array $options = []): self
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        $this->prependFirstOption();

        return $this->options ?? $this->options = (property_exists($this, 'optionsPath') ? config($this->optionsPath, []) : []);
    }

    public function getKeys(): array
    {
        return collect($this->getOptions())
            ->keys()
            ->map(fn ($value) => (string) $value)
            ->filter(fn ($value) => strlen($value))
            ->values()
            ->toArray();
    }

    private function prependFirstOption(): void
    {
        if (array_key_first($this->options) !== '') {
            $this->options = ['' => $this->firstOption] + $this->options;
        }
    }
}
