<div class="swiper-slide group/item overflow-hidden shadow-md hover:shadow-lg rounded-xl relative">
    <div class="h-[240px] w-full block bg-cover bg-no-repeat bg-center relative" style="background-image: url({{$item->getFirstMediaUrl() ?: asset('images/item_placeholder.jpg')}})">
        <div class="font-bold absolute left-4 bottom-4 bg-slate-100 py-1 px-2 shadow-sm rounded-md text-lg group-hover/item:bg-red-500 group-hover/item:text-white">
            {{$item->formatted_price}}
        </div>
    </div>
    <div class="p-6 space-y-6">
        <div class="h-[50px]">{{$item->address}}</div>
        <div class="flex flex-wrap justify-start space-x-4 text-sm">
            @if($item->rooms)
                <p class="flex items-center space-x-1"><x-icons.bed class="w-6 h-6"/> <span>{{$item->rooms}}</span></p>
            @endif
            @if($item->total_area)
                <p class="flex items-center space-x-1"><x-icons.size class="w-5 h-5"/> <span>{{$item->total_area}} м²</span></p>
            @endif
            @if($item->floor && $item->floors)
                <p class="flex items-center space-x-1"><x-icons.floor class="w-5 h-5"/> <span>{{$item->floor}} / {{$item->floors}} этаж</span></p>
            @else
                <p class="flex items-center space-x-1"><x-icons.floor class="w-5 h-5"/> <span>{{$item->floor}} этаж</span></p>
            @endif
        </div>
        <hr>
        <div class="flex justify-between items-center relative">
            @isset($item->deal_type)
                <p>{{$item->deal_type->name}}</p>
            @endisset
            <div>
                <livewire:wishlist-item :itemId="$item->id" wire:key="{{'wish-item-id-' . $item->id . '-' . substr(md5(rand()),0,5)}}" />
            </div>
        </div>
    </div>
    <a href="{{route('items.show', $item)}}" class="absolute inset-0"></a>
</div>
