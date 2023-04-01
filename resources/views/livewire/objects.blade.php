<div>
    <div>
        <span>Найдено {{$totalItems}} объектов</span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @each('items.item', $items, 'item', 'item.no-items')
    </div>
    @if(!$isBot)
        <x-loading />
    @endif
</div>
