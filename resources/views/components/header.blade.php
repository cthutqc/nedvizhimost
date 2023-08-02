<div class="w-full">
    <x-container class="hidden lg:block">
        <div class="flex justify-between items-center py-2">
            <x-logo/>
            <div class="space-y-2">
                <ul class="hidden lg:flex justify-center space-x-2 items-center">
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
                        <button x-data="{}"
                                @click.prevent="window.livewire.emitTo('modals.buy-house', 'show')"
                                class="text-white w-max px-2 block bg-red-500 rounded-md text-base"
                        >Заказать дом</button>
                </ul>
                <ul class="hidden lg:flex justify-center space-x-2 items-center">
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
                            <a href="/insurance" @class([
                                        "hover:bg-red-500 hover:text-white p-1 rounded-lg",
                                        "bg-red-500 text-white" => request()->segment(1) === 'insurance',
                                ])>
                                Страхование
                            </a>
                        </li>
                        <li>
                            <a href="/services/iuridiceskie-uslugi" @class([
                                        "hover:bg-red-500 hover:text-white p-1 rounded-lg",
                                        "bg-red-500 text-white" => request()->segment(2) === 'iuridiceskie-uslugi'
                                ])>
                                Юрист
                            </a>
                        </li>
                    <li>
                        <button x-data="{}" x-on:click.prevent="window.livewire.emitTo('modals.search', 'showSearch')">
                            <x-icons.search/>
                        </button>
                    </li>
                </ul>

            </div>
            <div class="w-[200px] xl:w-auto">
                <a href="tel:{{$phone}}" class="font-bold text-sm xl:text-2xl block text-right">{{$phone}}</a>
                <button x-data="{}"
                        @click.prevent="window.livewire.emitTo('modals.callback', 'show')"
                        class="text-red-500 block text-right text-[10px] xl:text-base"
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
                            <li>
                                <a href="/insurance" @class([
                                        "hover:bg-red-500 hover:text-white p-1 rounded-lg",
                                        "bg-red-500 text-white" => request()->segment(1) === 'insurance'
                                ])>
                                    Страхование
                                </a>
                            </li>
                            <li>
                                <a href="/services/iuridiceskie-uslugi" @class([
                                        "hover:bg-red-500 hover:text-white p-1 rounded-lg",
                                        "bg-red-500 text-white" => request()->segment(2) === 'iuridiceskie-uslugi'
                                ])>
                                    Юрист
                                </a>
                            </li>
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
