<div class="swiper-slide group/item overflow-hidden shadow-md hover:shadow-lg rounded-xl relative">
    <div class="h-[240px] w-full block bg-cover bg-no-repeat bg-center relative" style="background-image: url({{$item->getFirstMediaUrl() ?: asset('images/item_placeholder.jpg')}})">
        <a href="{{route('items.show', $item)}}" class="absolute inset-0"></a>
        <div class="absolute left-4 right-4 m-auto bottom-4">
            <div class="flex justify-between items-center">
                <div class="font-bold bg-slate-100 py-1 px-2 shadow-sm rounded-md text-lg group-hover/item:bg-red-500 group-hover/item:text-white">
                    {{$item->formatted_price}}
                </div>
                <div class="flex space-x-2 items-center">
                    <div class="bg-black bg-opacity-70 p-1 rounded-md text-white">
                        <a href="{{route('items.show', $item)}}"><x-icons.inside class="fill-current h-4 w-4" /></a>
                    </div>
                    <div class="bg-black bg-opacity-70 p-1 rounded-md">
                        <livewire:wishlist-item :itemId="$item->id" wire:key="{{'wish-item-id-' . $item->id . '-' . substr(md5(rand()),0,5)}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-6 space-y-6">
        <a href="{{route('items.show', $item)}}" class="h-[50px] hover:underline font-bold">{{$item->address}}</a>
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
        <div class="flex justify-between space-x-1 items-center relative">
            <a href="tel:{{$item->user ? $item->user->phone : '+70000000000'}}" class="flex items-center justify-center space-x-1 border border-slate-300 rounded-md py-2 w-full hover:bg-red-500 hover:border-red-500 hover:text-white">
                <x-icons.phone class="h-5 w-5"/><span>Позвонить</span>
            </a>
            <button class="flex items-center justify-center space-x-1 border border-slate-300 rounded-md py-2 w-full hover:bg-red-500 hover:border-red-500 hover:text-white">
                <x-icons.mail class="h-5 w-5"/><span>Написать</span>
            </button>
        </div>
    </div>
</div>
