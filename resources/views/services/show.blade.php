<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('service', $service) }}

        <div class="rounded-xl overflow-hidden grid md:grid-cols-2" style="background-color: {{$service->color ?? '#eeeeee'}}">
            <div class="px-10 md:py-20 py-10">
                <x-h1>{{$service->h1?:$service->name}}</x-h1>
                <p>{!! $service->short_text !!}</p>
            </div>
            <div class="bg-cover bg-no-repeat bg-center" style="background-image: url('{{$service->getFirstMediaUrl()}}')"></div>
        </div>

        @if($service->text)
            <x-row>
                <div class="description">
                    {!! $service->text !!}
                </div>
            </x-row>
        @endif

        <x-service-mortgage-realties :mortgageRealties="$service->mortgage?->mortgage_realties" />

        <x-service-mortgage-conditions :mortgageConditions="$service->mortgage?->mortgage_conditions" />

        <x-service-numbers :serviceNumbers="$service->service_numbers" :color="$service->color"/>

        <livewire:callback-form />

        <x-advantages />

        <x-reviews />

        <x-faq :faqs="$service->faqs" />

    </x-container>
</x-app-layout>
