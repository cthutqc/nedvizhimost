@if($reviews)

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
        >
            <x-title>
                Отзывы
            </x-title>
            <div class="group overflow-hidden relative">
                <x-arrow dir="prev" />
                <div class="swiper-container slider overflow-y-visible relative" x-ref="container">
                    <div class="swiper-wrapper py-4">
                        @foreach($reviews as $review)
                            <div class="swiper-slide overflow-hidden border border-slate-300 rounded-xl p-4 h-full" style="height: unset">
                                <div class="flex justify-start space-x-2 items-center">
                                    <img
                                        class="rounded-full w-16 h-16"
                                        src="{{$review->getFirstMediaUrl() ? $review->getFirstMediaUrl() : asset('images/user_placeholder.jpg')}}"
                                    />
                                    <p class="font-semibold text-lg">{{$review->name}}</p>
                                </div>
                                <div class="pt-4">
                                    {!! $review->text !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <x-arrow dir="next" />
            </div>
        </div>

    </x-row>


@endif
