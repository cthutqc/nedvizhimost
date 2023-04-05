<div>
    <x-row>
        <span>Найдено {{$totalItems}} объектов</span>
    </x-row>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @each('items.item', $items, 'item', 'items.no-items')
    </div>
    @if(!$isBot)
        <x-loading />
    @endif
</div>
