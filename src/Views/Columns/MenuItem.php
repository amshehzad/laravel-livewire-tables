<?php

namespace Rappasoft\LaravelLivewireTables\Views\Columns;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;
use Rappasoft\LaravelLivewireTables\Traits\HasWireElement;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\MenuItemConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Core\HasLocationCallback;
use Rappasoft\LaravelLivewireTables\Views\Traits\Core\HasTitleCallback;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\MenuItemHelpers;

class MenuItem extends Column
{
    use MenuItemConfiguration,
        MenuItemHelpers,
        HasTitleCallback,
        HasLocationCallback;
    use HasWireElement;

    protected string $view = 'livewire-tables::includes.columns.menu-item';

    protected mixed $permissionCallback = null;

    protected mixed $visibleCallback = null;

    protected ?string $icon = null;

    protected bool $divider = false;

    protected string $dividerPosition = 'after';

    protected bool $form = false;

    protected ?string $method = 'post';

    public function __construct(string $title, ?string $from = null)
    {
        parent::__construct($title, $from);

        $this->label(fn () => null);
    }

    public function getContents(Model $row): null|string|HtmlString|Application|Factory|View
    {
        if (! $this->hasTitleCallback()) {
            throw new DataTableConfigurationException('You must specify a title callback for an link column.');
        }

        $attributes = $this->hasAttributesCallback() ? app()->call($this->getAttributesCallback(), ['row' => $row]) : [];

        if (! isset($attributes['class'])) {
            $attributes['class'] = '';
        }
        $attributes['class'] .= ' dropdown-item ';

        $this->setWireElement($row);

        $data = [
            'form' => $this->form,
            'method' => $this->method,
        ];

        $path = $this->hasLocationCallback() ? app()->call($this->getLocationCallback(), ['row' => $row]) : 'javascript:void(0)';

        $hasPermission = $this->hasPermissionCallback() ? app()->call($this->getPermissionCallback(), ['row' => $row]) : true;
        $isVisible = $this->hasVisibleCallback() ? app()->call($this->getVisibleCallback(), ['row' => $row]) : true;

        if (! $hasPermission || ! $isVisible) {
            $this->hidden = true;

            return null;
        }

        return view($this->getView(), $data)
            ->withColumn($this)
            ->withTitle($this->hasTitleCallback() ? app()->call($this->getTitleCallback(), ['row' => $row]) : '')
            ->withIcon($this->icon)
            ->withPath($path)
            ->withAttributes($attributes);
    }
}
