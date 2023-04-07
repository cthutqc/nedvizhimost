<div class="w-full">
    <x-container class="hidden lg:block">
        <div class="flex justify-between items-center py-4">
            <x-logo />
            <ul class="hidden lg:flex justify-center space-x-10 items-center">
                @foreach($pages as $page)
                <li>
                    <a href="{{route('pages.show', $page)}}" class="hover:text-red-500 text-gray-400">
                        {{$page->name}}
                    </a>
                </li>
                @endforeach
            </ul>
            <div>
                <a href="tel:+7 000 000 00 00" class="font-bold text-2xl block">+7 000 000 00 00</a>
                <button x-data="{}"
                        @click.prevent="window.livewire.emitTo('modals.callback', 'show')"
                        class="text-red-500 block text-right"
                >Заказать звонок</button>
            </div>
        </div>
    </x-container>
    <div
        x-data="{ atTop: false}"
        @scroll.window="atTop = (window.pageYOffset < 50) ? false: true"
        :class="{ 'fixed bg-white shadow-xl top-0 left-0 right-0 z-[99]': atTop }"
        class="py-2 md:py-6 w-full block">
        <x-container>
            <div class="flex justify-between items-center">
                <div class="lg:hidden">
                    <x-logo />
                </div>
                <ul class="hidden lg:flex justify-start space-x-10">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('categories.show', $category)}}" @class([
        "text-lg hover:bg-red-500 hover:text-white p-1 rounded-lg",
        "bg-red-500 text-white" => strpos(Request::url(), 'object') ? (App\Models\Item::where('slug', request()->segment(2))
            ->first()->category->id == $category->id) : strpos(Request::url(), $category->slug),
])>
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="flex space-x-4 items-center">
                    @if(!Auth::check())
                        <button x-data="{}" x-on:click.prevent="window.livewire.emitTo('modals.login', 'show')">
                            <x-icons.profile/>
                        </button>
                    @else
                        <a href="#">
                            <x-icons.profile/>
                            <p>{{auth()->user()->name}}</p>
                        </a>
                    @endif
                        <button x-data="{}" x-on:click.prevent="window.livewire.emitTo('modals.search', 'showSearch')">
                            <x-icons.search/>
                        </button>
                    <x-icons.wishlist class="h-9 w-9" />
                    <x-mobile-menu />
                </div>
            </div>
        </x-container>
    </div>
</div>
