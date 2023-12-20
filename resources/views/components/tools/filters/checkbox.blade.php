<div>
    <x-livewire-tables::tools.filter-label :$filter :$filterLayout :$tableName :$isTailwind :$isBootstrap4 :$isBootstrap5 :$isBootstrap />

    <div @class([
        "rounded-md shadow-sm" => $isTailwind,
        "mb-3 mb-md-0 input-group" => $isBootstrap,
    ])>
        <div class="form-check">
            <input
                wire:model.live="filterComponents.{{ $filter->getKey() }}"
                wire:key="{{ $filter->generateWireKey($tableName, 'text') }}"
                id="{{ $tableName }}-filter-{{ $filter->getKey() }}@if($filter->hasCustomPosition())-{{ $filter->getCustomPosition() }}@endif"
                type="checkbox"
                class="form-check-input"
                @checked($filter->getValue() == $filter->getFilterDefaultValue())
                value="{{ $filter->getValue() }}"
            >
            <label class="form-check-label" for="{{ $filter->generateWireKey($tableName, 'text') }}">{{ $filter->getLabel() }}</label>
        </div>
    </div>
</div>
