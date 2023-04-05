<div class="w-full">
    <x-modal wire:model="show" wire:model2="search">
        <x-row>
            <div class="w-full relative">
                <input wire:model="searchString" class="rounded-xl p-4 pl-12 w-full border border-slate-300" />
                <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                    <x-icons.search />
                </span>
            </div>
            @isset($items)
                <div class="grid md:grid-cols-2 gap-4 mt-10 max-h-[500px] overflow-y-scroll scrollbar-hide">
                    @foreach($items as $item)
                        <a href="{{route('items.show', $item)}}" class="flex space-x-2 items-center border border-slate-300 rounded-xl overflow-hidden">
                            <div
                                class="bg-cover bg-center bg-no-repeat w-32 h-32"
                                style="background-image: url({{$item->getFirstMediaUrl() ?: asset('images/item_placeholder.jpg')}})"></div>
                            <div>
                                <p>{{$item->name}}</p>
                                <p class="slate-300 text-sm">{{$item->address}}</p>
                                <p class="">{{$item->formattedPrice}}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endisset
        </x-row>
    </x-modal>
</div>
