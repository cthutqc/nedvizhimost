<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('item', $item) }}

        <x-h1>
            {{$item->name}}
        </x-h1>

        <x-row>
            <p>№ объекта: {{$item->id}}</p>
        </x-row>

        <div class="block lg:grid lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                <div x-data="{swiper: null, thumb: null}"
                     x-init="thumbs = new Swiper($refs.container_thumbs, {
                        loop: false,
                        autoplay: false,
                        slidesPerView: 4,
                        spaceBetween: 10,
                        breakpoints: {
                                768: {
                                    slidesPerView: 5,
                                    spaceBetween: 10,
                                },
                                1024: {
                                    slidesPerView: 5,
                                    spaceBetween: 10,
                                },
                            },
                    }),
                     swiper = new Swiper($refs.container, {
                        loop: false,
                        autoplay: false,
                        slidesPerView: 1,
                        spaceBetween: 10,
                        thumbs: {
                            swiper: thumbs,
                        },
                    })" class="col-span-2">
                    <div class="group relative w-full z-0">
                        <div class="swiper-container slider" x-ref="container">
                            <x-arrow dir="prev" />
                            <div class="swiper-wrapper">
                                @forelse($item->getMedia() as $image)
                                    <div class="swiper-slide block h-[300px] md:h-[500px] w-full relative bg-center bg-center bg-no-repeat bg-cover" style="background-image: url({{$image->getUrl()}})">
                                        <a data-fslightbox="gallery" class="absolute top-0 left-0 right-0 bottom-0" href="{{$image->getUrl()}}">
                                        </a>
                                    </div>
                                @empty
                                    <div class="swiper-slide block h-[250px] md:h-[500px] w-full relative bg-center bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('images/item_placeholder.jpg')}})">
                                    </div>
                                @endforelse
                            </div>
                            <x-arrow dir="next" />
                        </div>
                    </div>
                    <div class="md:block relative group mt-2 gallery-thumbs">
                        <div class="swiper-container slider overflow-hidden" x-ref="container_thumbs">
                            <x-arrow dir="prev" />
                            <div class="swiper-wrapper">
                                @forelse($item->getMedia() as $image)
                                    <div class="swiper-slide cursor-pointer flex-row h-[80px] xl:h-[150px] bg-center bg-no-repeat bg-cover" style="background-image: url({{$image->getUrl()}})">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <x-arrow dir="next" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-10">
                <div class="border-b border-b-slate-200 space-y-4 pb-4">
                    <p class="text-slate-400">Цена</p>
                    <p class="font-bold text-3xl">{{$item->formattedPrice}}</p>
                </div>
                <div class="flex space-x-4 w-full bg-slate-50 border border-slate-200 rounded-xl p-4">
                    <div>
                        <img
                            src="{{count($item->user->getMedia()) ? $item->user->getFirstMediaUrl() : asset('images/user_placeholder.jpg')}}"
                            class="h-[140px]"
                        />
                    </div>
                    <div class="space-y-4">
                        <p class="font-bold text-2xl">{{$item->user->name}}<br>{{$item->user->last_name}}</p>
                        <p class="text-slate-400">Менеджер</p>
                        <p class="font-bold text-xl">{{$item->user->phone}}</p>
                    </div>
                </div>
            </div>

        </div>

        <div>
            {{$item->text}}
        </div>
    </x-container>
</x-app-layout>
