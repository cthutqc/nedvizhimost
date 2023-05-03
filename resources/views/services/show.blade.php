<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('service', $service) }}

        <div class="rounded-xl overflow-hidden p-10 grid md:grid-cols-2" style="background-color: {{$service->color ?? '#eeeeee'}}">
            <div>
                <x-h1>{{$service->name}}</x-h1>
                <p>{!! $service->short_text !!}</p>
            </div>
            <div></div>
        </div>

        @if($service->text)
            <x-row>
                <div class="description">
                    {!! $service->text !!}
                </div>
            </x-row>
        @endif

        <x-service-numbers :serviceNumbers="$service->service_numbers" />

        <livewire:callback-form />

        <x-advantages />

        <x-reviews />

        <x-faq :faqs="$service->faqs" />

    </x-container>
</x-app-layout>
