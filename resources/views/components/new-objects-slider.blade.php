<x-row>
    <div x-data="{swiper: null}"
         x-init="swiper = new Swiper($refs.container, {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        slidesPerView: 1,
        spaceBetween: 30,
        breakpoints: {
            768: {
                slidesPerView: 2.2,
            },
            1024: {
                slidesPerView: 3.3,
            },
            1440: {
                slidesPerView: 4,
            },
        },
    })"
         class="sticky top-0"
    >
        <x-title>
            Новые объекты
        </x-title>
        <div class="group overflow-hidden relative">
            <x-arrow dir="prev" />
            <div class="swiper-container slider overflow-y-visible relative" x-ref="container">
                <div class="swiper-wrapper py-4">
                    @each('items.item', $items, 'item')
                </div>
            </div>
            <x-arrow dir="next" />
        </div>
    </div>

</x-row>
