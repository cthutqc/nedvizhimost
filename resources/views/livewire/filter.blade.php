<x-row>
    <div @class([
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
                        <p wire:click="selectCategory({{$category->id}})" @click="open = false" @class([
                        "hover:text-red-500 py-4 cursor-pointer",
                        "text-red-500" => $category->id === $selected['category']['id']
                        ])>{{$category->name}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div x-data="{open:false}" class="hidden lg:block relative bg-white w-full border-r border-r-slate-300 whitespace-nowrap border-y border-r border-slate-300">
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
        <div x-data="{open:false}" class="hidden lg:block relative bg-white w-full border-r border-r-slate-300 whitespace-nowrap border-y border-r border-slate-300">
            <p @click="open = !open" class="cursor-pointer p-4">Стоимость</p>
            <div x-show="open"
                 @click.away="open = false"
                 class="absolute w-[380px] top-[110%] left-0 py-4 px-8 shadow-xl bg-white rounded-xl z-20">

                <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">

                    <div class="flex items-center justify-between py-5 space-x-4 text-sm text-gray-700">
                        <div>
                            <input type="text" maxlength="5" x-on:input.debounce="mintrigger" x-model="minprice"
                                   wire:model="min"
                                   class="w-24 px-3 py-2 text-center border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        </div>
                        <div>
                            <input type="text" maxlength="5" x-on:input.debounce.300="maxtrigger" x-model="maxprice"
                                   wire:model="max"
                                   class="w-24 px-3 py-2 text-center border border-gray-200 rounded-lg bg-gray-50 focus:border-red-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <input type="range" step="100" x-bind:min="min" x-bind:max="max" x-on:input="mintrigger" x-model="minprice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                        <input type="range" step="100" x-bind:min="min" x-bind:max="max" x-on:input="maxtrigger" x-model="maxprice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                        <div class="relative z-10 h-2">

                            <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

                            <div class="absolute z-20 top-0 bottom-0 rounded-md bg-red-500" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

                            <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-red-500 rounded-full -mt-2" x-bind:style="'left: '+minthumb+'%'"></div>

                            <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-red-500 rounded-full -mt-2" x-bind:style="'right: '+maxthumb+'%'"></div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="hidden lg:block relative bg-white w-full whitespace-nowrap border-y border-slate-300">
            <p class="cursor-pointer p-4">Город, адрес, район</p>
        </div>
        @if(!$is_home)
            <div class="relative rounded-l-xl lg:rounded-l-none bg-white w-full lg:w-max border-r border-r-slate-300 whitespace-nowrap border-y border-l border-slate-300">
                <button wire:click.prevent="showFilter" class="flex items-center p-3 px-10 m-auto">
                    <x-icons.filter class="h-4 w-auto" />
                    <span>Фильтр</span>
                </button>
            </div>
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
        <button wire:click.prevent="filter" class="p-4 px-10 bg-red-500 hover:bg-red-700 rounded-r-xl border-y border-r border-red-500 hover:border-red-700 w-max text-white whitespace-nowrap">Найти {{$itemsCount}}</button>
        @endif
    </div>
</x-row>

@push('js')
    <script>
        function range() {
            return {
                minprice: {{$min}},
                maxprice: {{$max}},
                min: {{$min}},
                max: {{$max}},
                minthumb: 0,
                maxthumb: 0,
                mintrigger() {
                    this.validation();
                    this.minprice = Math.min(this.minprice, this.maxprice - 500);
                    this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                    if(this.minprice > {{$min}})
                        this.$wire.setMin(this.minprice);
                },
                maxtrigger() {
                    this.validation();
                    this.maxprice = Math.max(this.maxprice, this.minprice + 200);
                    this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                    if(this.minprice < {{$max}})
                        this.$wire.setMax(this.maxprice);
                },
                validation() {
                    if (/^\d*$/.test(this.minprice)) {
                        if (this.minprice > this.max) {
                            this.minprice = 9500;
                        }
                        if (this.minprice < this.min) {
                            this.minprice = this.min;
                        }
                    } else {
                        this.minprice = 0;
                    }
                    if (/^\d*$/.test(this.maxprice)) {
                        if (this.maxprice > this.max) {
                            this.maxprice = this.max;
                        }
                        if (this.maxprice < this.min) {
                            this.maxprice = 200;
                        }
                    } else {
                        this.maxprice = 10000;
                    }
                }
            }
        }
    </script>
@endpush
