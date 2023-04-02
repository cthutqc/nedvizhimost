<div class="w-full">
    <x-container>
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
                <a href="tel:+7 000 000 00 00" class="font-bold text-2xl">+7 000 000 00 00</a>
            </div>
        </div>
    </x-container>
    <div
        x-data="{ atTop: false}"
        @scroll.window="atTop = (window.pageYOffset < 50) ? false: true"
        :class="{ 'fixed bg-white shadow-xl top-0 left-0 right-0 m-auto z-[99]': atTop }"
        class="flex justify-between py-6">
        <x-container>
            <ul class="hidden lg:flex justify-start space-x-10">
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('categories.show', $category)}}" class="text-lg hover:bg-red-500 hover:text-white p-1 rounded-lg">
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </x-container>
    </div>
</div>
