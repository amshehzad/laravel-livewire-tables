@aware(['tableName'])
@php
    $filterLayout = $component->getFilterLayout();
@endphp

<div>
    @if($filter->hasCustomFilterLabel() && !$filter->hasCustomPosition())
        @include($filter->getCustomFilterLabel(),['filter' => $filter, 'filterLayout' => $filterLayout, 'tableName' => $tableName  ])
    @elseif(!$filter->hasCustomPosition())
        <x-livewire-tables::tools.filter-label :filter="$filter" :filterLayout="$filterLayout"  />
    @endif

    <div @class([
            'rounded-md shadow-sm' => $component->isTailwind(),
            'inline' => $component->isBootstrap(),
        ])
    >
        <select
            wire:model.live="filterComponents.{{ $filter->getKey() }}"
            wire:key="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
            id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
            @class([
                    'block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white dark:border-gray-600' => $component->isTailwind(),
                    'form-control' => $component->isBootstrap4(),
                    'form-select' => $component->isBootstrap5(),
                ])
        >
            @foreach($filter->getOptions() as $key => $value)
                @if (is_iterable($value))
                    <optgroup label="{{ $key }}">
                        @foreach ($value as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                        @endforeach
                    </optgroup>
                @else
                    <option value="{{ $key }}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
