@if($advantages)
    <x-row>
        <x-title>Наши преимущества</x-title>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach($advantages as $advantage)
                <div class="rounded-lg border border-slate-300 px-4 py-10 text-center font-semibold text-lg">
                    <x-dynamic-component :component="'icons.'.$advantage->icon" class="fill-red-700 w-20 h-20 m-auto"/>
                    <p class="block mt-10 w-full text-center">{{$advantage->name}}</p>
                </div>
            @endforeach
        </div>
    </x-row>
@endif
