<div class="w-full">
    <x-container>
        <div class="grid grid-cols-4 gap-4">
            <ul class="hidden lg:block">
                @foreach($categories as $category)
                <li>
                    <a href="{{route('categories.show', $category)}}" class="block py-2">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
            </ul>
            <ul class="hidden lg:block">
                @foreach($pages as $page)
                    <li>
                        <a href="{{route('pages.show', $page)}}" class="block py-2">
                            {{$page->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </x-container>
</div>
