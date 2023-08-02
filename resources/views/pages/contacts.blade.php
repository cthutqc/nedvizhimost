<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('page', $page) }}

        <x-h1>
            {{$page->name}}
        </x-h1>

        <x-row>
            <x-text>
                {!! $page->text !!}
            </x-text>
        </x-row>

        <div class="grid lg:grid-cols-2 gap-4">
            <div class="space-y-4">
                @foreach($contacts as $contact)
                    <p>{{$contact->name}}: <span class="font-bold">{{$contact->value}}</span></p>
                @endforeach
                <livewire:message-form />
            </div>
            <div>
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac1359f2436463cc8e2f22432d72a824ea4de56835f15078298a509a2430f84fc&amp;width=100%25&amp;height=700&amp;lang=ru_RU&amp;scroll=false"></script>
            </div>
        </div>

    </x-container>
</x-app-layout>
