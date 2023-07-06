<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('vacancies', $page) }}

        <x-h1>
            {{$page->name}}
        </x-h1>

        <x-row>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @each('vacancies.item', $vacancies, 'vacancy', 'vacancies.no-items')
            </div>
        </x-row>

        <livewire:callback-form />

    </x-container>
</x-app-layout>
