<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('category', $category) }}

        <x-h1>
            {{$category->name}}
        </x-h1>

        <livewire:objects
            :category="$category"
            :isBot="preg_match('/google|googlebot|Lighthouse/i', Request::userAgent()) ? true : false"/>

    </x-container>
</x-app-layout>
