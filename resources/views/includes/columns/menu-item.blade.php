@if($column->hasDivider() && $column->dividerPosition() == 'before')
    <div class="dropdown-divider"></div>
@endif

@if($form)
    <form class="d-inline" action="{{ $path }}" method="post">
        @csrf
        @method($method)
        <button {!! count($attributes) ? $column->arrayToAttributes($attributes) : '' !!}>
            @if($icon)
                <i class="{{ $icon }}"></i>
            @endif
            {{ __($title) }}
        </button>
    </form>
@else
    <a
        href="{{ $path }}"
        @if($column->hasWireElement())
            wire:{{ $column->getWireElementType() }}="{{ $column->getWireElementComponentName() }} , @js($column->getWireElementParams())"
        @endif

        {!! count($attributes) ? $column->arrayToAttributes($attributes) : '' !!}>
        @if($icon)
            <i class="{{ $icon }}"></i>
        @endif
        {{ __($title) }}
    </a>
@endif

@if($column->hasDivider() && $column->dividerPosition() == 'after')
    <div class="dropdown-divider"></div>
@endif



