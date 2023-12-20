<div x-data="{ showDropdown: false }" x-init="showDropdown = $refs.dropdownMenu.children.length > 0">
    <div class="dropdown"{!! count($attributes) ? $column->arrayToAttributes($attributes) : '' !!}>
        {!! $title !!}
        <a x-show="showDropdown"  href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="far fa-ellipsis-h"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end py-0 z-10" x-ref="dropdownMenu" style="z-index: 10!important;">
            @foreach($actions as $action)
                @continue((bool)$action->getContents($row) === false)
                <div>
                    {!! $action->getContents($row) !!}
                </div>
            @endforeach
        </div>
    </div>

</div>
