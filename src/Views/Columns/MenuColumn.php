<?php

namespace Rappasoft\LaravelLivewireTables\Views\Columns;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\MenuColumnConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Core\HasTitleCallback;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\MenuColumnHelpers;

class MenuColumn extends Column
{
    use MenuColumnConfiguration,
        MenuColumnHelpers;
    use HasTitleCallback;

    protected array $actions = [];

    protected string $view = 'livewire-tables::includes.columns.menu';

    public function __construct(string $title, ?string $from = null)
    {
        parent::__construct($title, $from);

        $this->label(fn () => null);
    }

    public function getContents(Model $row): null|string|HtmlString|DataTableConfigurationException|Application|Factory|View
    {
        return view($this->getView())
            ->withColumn($this)
            ->withTitle($this->hasTitleCallback() ? app()->call($this->getTitleCallback(), ['row' => $row]) : '')
            ->withRow($row)
            ->withActions($this->getActions())
            ->withAttributes($this->hasAttributesCallback() ? app()->call($this->getAttributesCallback(), ['row' => $row]) : []);
    }
}
