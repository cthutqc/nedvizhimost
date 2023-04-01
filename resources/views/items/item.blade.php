<div class="swiper-slide overflow-hidden border border-slate-100 hover:shadow-lg rounded-xl relative">
    <div class="h-[200px] w-full block bg-cover bg-no-repeat bg-center" style="background-image: url({{$item->getFirstMediaUrl() ?: asset('images/item_placeholder.png')}})"></div>
    <div class="p-10 text-2xl font-bold">{{$item->formatted_price}}</div>
    <div class="px-10 py-4 text-slate-400">{{$item->address}}</div>
    <a href="{{route('items.show', $item)}}" class="absolute inset-0"></a>
</div>
