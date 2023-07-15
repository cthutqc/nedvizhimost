<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('page', $page) }}

        <x-h1>
            {{$page->name}}
        </x-h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
            @each('services.item', $services, 'service')
            <a href="{{route('insurances.show')}}"
               class="rounded-xl overflow-hidden p-10 h-[370px] bg-contain bg-right-bottom bg-no-repeat bg-green-400"
               style="background-image: url('{{\App\Models\Insurance::find(1)->getFirstMediaUrl()}}')">
                <span class="font-semibold text-xl">{{\App\Models\Insurance::find(1)->name}}</span>
            </a>
        </div>

    </x-container>
</x-app-layout>
