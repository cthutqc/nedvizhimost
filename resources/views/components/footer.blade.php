<div class="w-full my-10">
    <x-container>
        <div class="grid md:grid-cols-4 gap-4">
            <ul class="hidden md:block">
                @foreach($categories as $category)
                <li>
                    <a href="{{route('categories.show', $category)}}" class="block py-2 hover:text-red-500">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
            </ul>
            <ul class="hidden md:block">
                @foreach($pages as $page)
                    <li>
                        <a href="{{route('pages.show', $page)}}" class="block py-2 hover:text-red-500">
                            {{$page->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul class="hidden md:block">
                @foreach($services as $service)
                    <li>
                        <a href="{{route('services.show', $service)}}" class="block py-2 hover:text-red-500">
                            {{$service->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div>
                <p class="text-sm">Данный интернет-сайт носит исключительно
                    информационный характер и ни при каких условиях не
                    является публичной офертой, определяемой положениями
                    Статьи 437 ч. 2 Гражданского кодекса Российской
                    Федерации.</p>
            </div>
        </div>
        <div class="my-4">
            <p>© {{config('app.name')}} {{date('Y')}}</p>
        </div>
    </x-container>
</div>
