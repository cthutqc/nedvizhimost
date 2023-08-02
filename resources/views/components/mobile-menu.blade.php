<div x-data="{open : false}" class="lg:hidden">
    <button @click="open = !open">
        <x-icons.hamburger class="h-8 w-8" />
    </button>
    <div x-show="open"
         class="hidden top-0 left-0 right-0 bottom-0 bg-black bg-opacity-70 z-[999]"
         :class="{ 'fixed' : open, 'hidden' : !open }"
         x-transition.opacity.100ms>
        <div
            @click.away="open = false"
            x-show="open"
            x-transition:enter="transition-all-600ms"
            x-transition:enter-start="translate-left-100%"
            x-transition:enter-end="translate-0"
            x-transition:leave="transition-all-600ms"
            x-transition:leave-start="translate-0"
            x-transition:leave-end="translate-left-100%"
            x-trap.noscroll.inert="open"
            class="offcanvas offcanvas-left fixed top-0 left-0 w-[90%] bottom-0 bg-white p-10 space-y-4">
            <div x-data="{ selected : null }" class="text-left overflow-auto">
                <button @click.prevent="selected !== 1 ? selected = 1 : selected = null" class="text-left w-full border-b border-b-slate-100 py-2 block font-bold">Каталог</button>
                <ul x-show="selected == 1">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('categories.show', $category)}}" class="w-full border-b border-b-slate-100 py-2 block">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
                <button @click.prevent="selected !== 2 ? selected = 2 : selected = null" class="text-left w-full border-b border-b-slate-100 py-2 block font-bold">Информация</button>
                <ul x-show="selected == 2">
                    @foreach($pages as $page)
                        <li>
                            <a href="{{route('pages.show', $page)}}" class="w-full border-b border-b-slate-100 py-2 block">{{$page->name}}</a>
                        </li>
                    @endforeach
                </ul>

                <button @click.prevent="selected !== 3 ? selected = 3 : selected = null" class="text-left w-full border-b border-b-slate-100 py-2 block font-bold">Услуги</button>
                <ul x-show="selected == 3">
                    @foreach($services as $service)
                        <li>
                            <a href="{{route('services.show', $service)}}" class="w-full border-b border-b-slate-100 py-2 block">{{$service->name}}</a>
                        </li>
                    @endforeach
                        <li>
                            <a href="/insurance" class="w-full border-b border-b-slate-100 py-2 block">Страхование</a>
                        </li>
                </ul>

            </div>
            <span @click.prevent="open = false" class="absolute top-2 right-2 focus:outline-none">
                <x-icons.close />
            </span>
        </div>
    </div>
</div>
