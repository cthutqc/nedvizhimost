<div class="w-full">
    <x-container class="hidden lg:block">
        <div class="flex justify-between items-center py-2">
            <x-logo />
            <div class="space-y-2">
                <ul class="hidden lg:flex justify-start space-x-10 items-center">
                    @foreach($pages as $page)
                        <li>
                            <a href="{{route('pages.show', $page)}}"
                               @class([
                "hover:bg-red-500 hover:text-white p-1 rounded-lg",
                "bg-red-500 text-white" => \Request::segment(1) == $page->slug
                ])>
                                {{$page->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <ul class="hidden lg:flex justify-start space-x-10 items-center">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('categories.show', $category)}}" @class([
        "hover:bg-red-500 hover:text-white p-1 rounded-lg",
        "bg-red-500 text-white" => strpos(Request::url(), 'object') ? (App\Models\Item::where('slug', request()->segment(2))
            ->first()->category->id == $category->id) : strpos(Request::url(), $category->slug),
])>
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <button x-data="{}" x-on:click.prevent="window.livewire.emitTo('modals.search', 'showSearch')">
                            <x-icons.search/>
                        </button>
                    </li>
                </ul>

            </div>
            <div>
                <a href="tel:{{$phone}}" class="font-bold text-2xl block">{{$phone}}</a>
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
        :class="{ 'fixed !block bg-white shadow-xl top-0 left-0 right-0 z-[99]': atTop }"
        class="py-2 w-full block md:hidden">
        <x-container>
            <div class="flex justify-between items-center">
                <x-logo />
                <div class="flex">
                    <ul class="hidden lg:flex justify-start space-x-10">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('categories.show', $category)}}" @class([
        "hover:bg-red-500 hover:text-white p-1 rounded-lg",
        "bg-red-500 text-white" => strpos(Request::url(), 'object') ? (App\Models\Item::where('slug', request()->segment(2))
            ->first()->category->id == $category->id) : strpos(Request::url(), $category->slug),
])>
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex justify-end space-x-4 items-center">
                        <button x-data="{}" x-on:click.prevent="window.livewire.emitTo('modals.search', 'showSearch')">
                            <x-icons.search/>
                        </button>
                    <x-mobile-menu />
                </div>
            </div>
        </x-container>
    </div>
</div>
