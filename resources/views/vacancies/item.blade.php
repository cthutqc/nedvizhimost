<div class="bg-white overflow-hidden shadow-md hover:shadow-lg rounded-xl relative p-4">
    <x-title>{{$vacancy->name}}</x-title>
    @if($vacancy->responsibilities)
        <x-sub-title>
            Должностные обязанности:
        </x-sub-title>
        <x-text>
            {!! $vacancy->responsibilities !!}
        </x-text>
    @endif
    @if($vacancy->requirements)
        <x-sub-title>
            Требования:
        </x-sub-title>
        <x-text>
            {!! $vacancy->requirements !!}
        </x-text>
    @endif
    @if($vacancy->conditions)
        <x-sub-title>
            Условия:
        </x-sub-title>
        <x-text>
            {!! $vacancy->conditions !!}
        </x-text>
    @endif
    @if($vacancy->salary)
        <x-sub-title>
            Заработная плата: {{$vacancy->salary}} ₽
        </x-sub-title>
    @endif
</div>
