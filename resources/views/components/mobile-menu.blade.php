<div x-data="{open : false}" class="lg:hidden">
    <button @click="open = !open">
        <x-icons.hamburger class="h-8 w-8" />
    </button>
    <div x-show="open" class="fixed top-0 left-0 right-0 bottom-0 bg-black bg-opacity-70 z-[999]" x-transition.opacity.100ms>
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
            class="offcanvas offcanvas-left fixed top-0 left-0 w-2/3 bottom-0 bg-white p-10 space-y-4">
            <ul>
                <li class="w-full border-b border-b-slate-100 py-2 block font-bold">Каталог</li>
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('categories.show', $category)}}" class="w-full border-b border-b-slate-100 py-2 block">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
            <ul>
                <li class="w-full border-b border-b-slate-100 py-2 block font-bold">Информация</li>
                @foreach($pages as $page)
                    <li>
                        <a href="{{route('pages.show', $page)}}" class="w-full border-b border-b-slate-100 py-2 block">{{$page->name}}</a>
                    </li>
                @endforeach
            </ul>
            <span @click.prevent="open = false" class="absolute top-2 right-2 focus:outline-none">
                <x-icons.close />
            </span>
        </div>
    </div>
</div>
