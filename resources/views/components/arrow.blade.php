@props([
    'dir',
])
<div @class([
        "h-max top-1/2 -translate-y-1/2 absolute block w-max inset-y-0 z-10 items-center",
        "left-1 swiper-prev" => $dir == 'prev',
        "right-1 swiper-next" => $dir == 'next',
])>
    <button
        @class([
            "lg:text-xl focus:outline-none fill-goldDark hover:fill-gold",
            "swiper-prev" => $dir == 'prev',
            "swiper-next" => $dir == 'next',
        ])
        @if($dir == 'prev')
            @click="swiper.slidePrev()"
        @else
            @click="swiper.slideNext()"
        @endif
    >
        @if($dir == 'prev')
            <x-left />
        @else
            <x-right />
        @endif
    </button>
</div>
