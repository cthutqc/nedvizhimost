<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('item', $item) }}

        <x-h1>
            {{$item->name}}
        </x-h1>
        <div>
            {{$item->text}}
        </div>
    </x-container>
</x-app-layout>
