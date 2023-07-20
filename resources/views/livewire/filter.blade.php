<x-row>
    <div
        @class([
        "items-center flex",
        "hidden lg:flex" => $is_home,
        ])>
        <div x-data="{open:false}" class="hidden lg:block rounded-l-xl relative bg-white w-full border border-slate-300 whitespace-nowrap">
            <p @click="open = !open" class="cursor-pointer p-4">{{$selected['category']['name']}}</p>
            <ul x-show="open"
                 @click.away="open = false"
                 class="absolute top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20"
            >
                @foreach($categories as $category)
                    <li @class([
                            "border-b border-b-slate-300" => !$loop->last
                        ])>
                        <p wire:click="liveCategory({{$category->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $category->id === $selected['category']['id']
                        ])>{{$category->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div x-data="{open:false}" class="hidden lg:block relative bg-white w-full border border-slate-300 whitespace-nowrap">
            <p @click="open = !open" class="cursor-pointer p-4">{{$selected['item_type'] ? $selected['item_type']['name'] : 'Тип недвижимости'}}</p>
            <ul x-show="open"
                @click.away="open = false"
                class="absolute top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20"
            >
                @foreach($itemTypes as $item_type)
                    <li @class([
                            "border-b border-b-slate-300" => !$loop->last
                        ])>
                        <p wire:click="liveDealType({{$item_type->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $item_type->id === $selected['item_type'] ? $selected['item_type']['id'] : 0
                        ])>{{$item_type->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div x-data="{open:false}" class="hidden lg:block relative bg-white w-full border border-slate-300 whitespace-nowrap">
            <p @click="open = !open" class="cursor-pointer p-4">{{$selected['deal_type'] ? $selected['deal_type']['name'] : 'Тип сделки'}}</p>
            <ul x-show="open"
                @click.away="open = false"
                class="absolute top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20"
            >
                @foreach($dealTypes as $deal_type)
                    <li @class([
                            "border-b border-b-slate-300" => !$loop->last
                        ])>
                        <p wire:click="liveDealType({{$deal_type->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $deal_type->id === $selected['deal_type'] ? $selected['deal_type']['id'] : 0
                        ])>{{$deal_type->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        @if($rooms)
        <div x-data="{open:false}" class="hidden lg:block relative bg-white w-full border-r border-r-slate-300 whitespace-nowrap border-y border-r border-slate-300">
            <p @click="open = !open" class="cursor-pointer p-4">
                @if(count($selected['rooms']))
                    @foreach($selected['rooms'] as $selectedRoom)
                        {{$selectedRoom}} @if(!$loop->last)-@endif
                    @endforeach
                    ком.
                @else
                Количество комнат
                @endisset
            </p>
            <div x-show="open"
                 @click.away="open = false"
                 class="absolute w-[380px] top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20 flex flex-wrap justify-start">
                @foreach($rooms as $room)
                    <input id="rooms{{$room->rooms}}" type="checkbox" class="hidden" wire:model="selected.rooms.{{$room->rooms}}" value="{{$room->rooms}}" />
                    <label for="rooms{{$room->rooms}}" @class([
                                "cursor-pointer rounded-md bg-slate-100 shadow-lg px-4 py-2 m-2 hover:bg-red-500 hover:text-white",
                                "!bg-red-500 text-white" => in_array($room->rooms, $this->selected['rooms'] ?: [])
                                ])>{{$room->rooms}}</label>
                @endforeach
            </div>
        </div>
        @endif
        <div x-data="{open:false}" class="hidden lg:block relative bg-white w-full border-r border-r-slate-300 whitespace-nowrap border-y border-r border-slate-300">
            <p @click="open = !open" class="cursor-pointer p-4">Стоимость</p>
            <div x-show="open"
                 @click.away="open = false"
                 class="absolute w-[380px] top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20">

                <div class="flex items-center justify-between py-5 space-x-4 text-sm text-gray-700">
                    <input type="text"
                           wire:model.debounce.500ms="min"
                           placeholder="От"
                           class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                    <input type="text"
                           wire:model.debounce.500ms="max"
                           placeholder="До"
                           class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                </div>

            </div>
        </div>
        @if(!$is_home)
            <livewire:off-canvas-filter :selected="$selected" :rooms="$rooms" :categories="$categories" :itemTypes="$itemTypes" :dealTypes="$dealTypes"/>
        @endif
        <a href="/map/{{$this->selected['category']['slug']}}"
            @class([
           "w-full lg:w-max relative p-4 bg-slate-800 space-x-1 text-white flex items-center border-y border-slate-800 justify-center whitespace-nowrap",
           "border-r rounded-r-xl" => !$is_home,
           ])
        >
            <x-icons.map class="h-4 w-auto fill-white stroke-white" />
            <span>На карте</span>
        </a>
        @if($is_home)
        <button wire:click.prevent="filter" class="p-4 px-10 bg-red-500 hover:bg-red-700 rounded-r-xl border-y border-r border-red-500 hover:border-red-700 w-max text-white whitespace-nowrap">Найти {{$itemsCount > 0 ? $itemsCount : ''}}</button>
        @endif
    </div>
</x-row>
