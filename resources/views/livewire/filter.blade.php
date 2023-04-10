<x-row>
    <div class="items-center hidden lg:flex">
        <div x-data="{open:false}" class="rounded-l-xl relative bg-white w-full border border-slate-300 whitespace-nowrap">
            <p @click="open = !open" class="cursor-pointer p-4">{{$selected['category']['name']}}</p>
            <ul x-show="open"
                 @click.away="open = false"
                 class="absolute top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20"
            >
                @foreach($categories as $category)
                    <li @class([
                            "border-b border-b-slate-300" => !$loop->last
                        ])>
                        <p wire:click="selectCategory({{$category->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $category->id === $selected['category']['id']
                        ])>{{$category->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div x-data="{open:false}" class="relative bg-white w-full border-r border-r-slate-300 whitespace-nowrap border-y border-r border-slate-300">
            <p @click="open = !open" class="cursor-pointer p-4">Количество комнат</p>
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
        <div class="relative bg-white w-full border-r border-r-slate-300 whitespace-nowrap border-y border-r border-slate-300">
            <p class="cursor-pointer p-4">Стоимость</p>
        </div>
        <div class="relative bg-white w-full whitespace-nowrap border-y border-slate-300">
            <p class="cursor-pointer p-4">Город, адрес, район</p>
        </div>
        <a href="#" class="w-max relative p-4 bg-slate-800 space-x-1 text-white flex items-center border-y border-slate-800 justify-center whitespace-nowrap">
            <x-icons.map class="h-4 w-auto fill-white stroke-white" />
            <span>На карте</span>
        </a>
        <button wire:click.prevent="filter" class="p-4 px-10 bg-red-500 hover:bg-red-700 rounded-r-xl border-y border-r border-red-500 hover:border-red-700 w-max text-white whitespace-nowrap">Найти {{$itemsCount}}</button>
    </div>
</x-row>
