<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('service', $service) }}

        <div class="rounded-xl overflow-hidden p-10 grid md:grid-cols-2" style="background-color: {{$service->color ?? '#eeeeee'}}">
            <div>
                <x-h1>{{$service->name}}</x-h1>
                <p>{!! $service->text !!}</p>
            </div>
            <div></div>
        </div>

        <livewire:callback-form />

        <x-advantages />

    </x-container>
</x-app-layout>
