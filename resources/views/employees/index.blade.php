<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('page', $page) }}

        <x-h1>
            {{$page->name}}
        </x-h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
            @each('employees.item', $users, 'user', 'employees.no-items')
        </div>

    </x-container>
</x-app-layout>
