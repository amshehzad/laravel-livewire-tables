<a
    @if($column->hasWireElement())
        wire:{{ $column->getWireElementType() }}="{{ $column->getWireElementComponentName() }} , @js($column->getWireElementParams())"
    @endif
    href="{{ $path }}"
    {!! count($attributes) ? $column->arrayToAttributes($attributes) : '' !!}>
    @if($column->isHtml())
        {!! $title !!}
    @else
        {{ $title }}
    @endif
</a>
