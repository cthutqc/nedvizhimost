<div x-data="{ filter_open : false }">
    <div class="rounded-l-xl lg:rounded-l-none bg-white w-full lg:w-max border-r border-r-slate-300 whitespace-nowrap border-y border-l border-slate-300">
        <button @click.prevent="filter_open = !filter_open" class="flex items-center p-3 px-10 m-auto">
            <x-icons.filter class="h-4 w-auto" />
            <span>Фильтр</span>
        </button>
    </div>
    <div x-show="filter_open"
         :class="{ 'fixed z-[999]' : filter_open, 'hidden': !filter_open }"
         class="hidden bg-black bg-opacity-30 inset-0">
        <div @click.away="filter_open = false" class="absolute max-h-[600px] inset-0 m-auto w-[80%] lg:w-[400px] bg-white shadow rounded-l-md">
            <div class="p-4 flex justify-between w-full shadow items-center">
                <x-title>Фильтр</x-title>
                <button @click.prevent="filter_open = false">
                    <x-icons.close />
                </button>
            </div>
            <div class="p-4 h-[400px] overflow-auto">
                <div>
                    <p class="font-bold my-4">Тип</p>
                    <div x-data="{open:false}" class="block rounded-md relative bg-white w-full border border-slate-300 whitespace-nowrap">
                        <p @click="open = !open" class="cursor-pointer p-4">{{$selected['category']['name']}}</p>
                        <ul x-show="open"
                            @click.away="open = false"
                            class="absolute top-[110%] inset-x-0 m-auto py-4 px-8 shadow-xl bg-white rounded-md z-20"
                        >
                            @foreach($categories as $category)
                                <li @class([
                                        "border-b border-b-slate-300" => !$loop->last
                                    ])>
                                    <p wire:click="setCategory({{$category->id}})" @click="open = false" @class([
                                            "hover:text-red-500 py-4 cursor-pointer",
                                            "text-red-500" => $category->id === $selected['category']['id']
                                            ])>{{$category->name}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @if($rooms)
                    <div>
                        <p class="font-bold my-4">Количество комнат</p>
                        <div class="flex flex-wrap justify-start">
                            @foreach($rooms as $room)
                                <input id="o-rooms{{$room->rooms}}" type="checkbox" class="hidden" wire:model="selected.rooms.{{$room->rooms}}" value="{{$room->rooms}}" />
                                <label for="o-rooms{{$room->rooms}}" @class([
                                        "cursor-pointer rounded-md bg-slate-100 shadow-lg px-4 py-2 m-2 hover:bg-red-500 hover:text-white",
                                        "!bg-red-500 text-white" => in_array($room->rooms, $this->selected['rooms'] ?: [])
                                        ])>{{$room->rooms}}</label>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div>
                    <p class="font-bold my-4">Общая площадь, м²</p>
                    <div class="flex items-center justify-between space-x-4 text-sm text-gray-700">
                        <input type="text"
                               placeholder="От"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        <input type="text"
                               placeholder="До"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <p class="font-bold my-4">Жилая площадь, м²</p>
                    <div class="flex items-center justify-between space-x-4 text-sm text-gray-700">
                        <input type="text"
                               placeholder="От"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        <input type="text"
                               placeholder="До"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <p class="font-bold my-4">Площадь кухни, м²</p>
                    <div class="flex items-center justify-between space-x-4 text-sm text-gray-700">
                        <input type="text"
                               placeholder="От"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        <input type="text"
                               placeholder="До"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <p class="font-bold my-4">Этаж</p>
                    <div class="flex items-center justify-between space-x-4 text-sm text-gray-700">
                        <input type="text"
                               placeholder="От"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        <input type="text"
                               placeholder="До"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <p class="font-bold my-4">Этажей в доме</p>
                    <div class="flex items-center justify-between space-x-4 text-sm text-gray-700">
                        <input type="text"
                               placeholder="От"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        <input type="text"
                               placeholder="До"
                               class="w-full px-3 py-2 text-left border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <p class="font-bold my-4">Тип жилья</p>
                    <div x-data="{open:false}" class="block relative bg-white w-full border border-slate-300 whitespace-nowrap">
                        <p @click="open = !open" class="cursor-pointer p-4">{{$selected['item_type'] ? $selected['item_type']['name'] : 'Тип недвижимости'}}</p>
                        <ul x-show="open"
                            @click.away="open = false"
                            class="absolute top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20"
                        >
                            @foreach($itemTypes as $item_type)
                                <li @class([
                            "border-b border-b-slate-300" => !$loop->last
                        ])>
                                    <p wire:click="selectDealType({{$item_type->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $item_type->id === $selected['item_type'] ? $selected['item_type']['id'] : 0
                        ])>{{$item_type->name}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div>
                    <p class="font-bold my-4">Тип сделки</p>
                    <div x-data="{open:false}" class="block relative bg-white w-full border border-slate-300 whitespace-nowrap">
                        <p @click="open = !open" class="cursor-pointer p-4">{{$selected['deal_type'] ? $selected['deal_type']['name'] : 'Тип сделки'}}</p>
                        <ul x-show="open"
                            @click.away="open = false"
                            class="absolute top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20"
                        >
                            @foreach($dealTypes as $deal_type)
                                <li @class([
                            "border-b border-b-slate-300" => !$loop->last
                        ])>
                                    <p wire:click="selectDealType({{$deal_type->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $deal_type->id === $selected['deal_type'] ? $selected['deal_type']['id'] : 0
                        ])>{{$deal_type->name}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-4 flex justify-between w-full items-center">
                <button @click.prevent="filter_open = false" class="text-white w-full bg-red-500 rounded-md p-2">
                    Показать {{$itemsCount}}
                </button>
            </div>
        </div>
    </div>
</div>
