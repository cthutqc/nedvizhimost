<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('insurance', $insurance) }}

        <div class="rounded-xl overflow-hidden grid lg:grid-cols-2 bg-green-400">
            <div class="p-10">
                <x-h1>{{$insurance->h1?:$insurance->name}}</x-h1>
                <p>{!! $insurance->short_text !!}</p>
            </div>
            <div class="bg-contain bg-no-repeat bg-right-bottom" style="background-image: url('{{$insurance->getFirstMediaUrl()}}')"></div>
        </div>
        <x-row>
            <x-text class="text-center">
                {!! $insurance->error_text !!}
            </x-text>
            <div class="grid lg:grid-cols-2 gap-12 my-8">
                @foreach($insuranceErrors as $error)
                    <p class="font-bold text-xl"><x-icons.check class="h-10 w-10 inline" /><span class="inline">{{$error->text}}</span></p>
                @endforeach
            </div>
        </x-row>

        <x-row>
            <div class="grid lg:grid-cols-2 gap-4">
                <x-text>
                    {!! $insurance->text !!}
                    <button x-data="{}"
                            @click.prevent="window.livewire.emitTo('modals.callback', 'show')"
                            class="w-full lg:w-max bg-red-500 hover:bg-red-700 text-white rounded-lg py-2 px-6"
                    >Заказать консультацию</button>
                </x-text>
                <div class="bg-cover bg-center bg-no-repeat" style="background-image: url('{{$insurance->getFirstMediaUrl('bio')}}')"></div>
            </div>
        </x-row>

        <x-row class="text-center">
            <x-title>Тысячи клиентов со всей России выбрали нас и вот почему:</x-title>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
                @foreach($insuranceAdvantages as $advantage)
                    <div class="text-center font-bold space-y-4 text-xl">
                        <img src="{{$advantage->getFirstMediaUrl()}}" class="h-32 w-32 m-auto">
                        <p>{{$advantage->name}}</p>
                    </div>
                @endforeach
            </div>
        </x-row>

        <x-row>
            <x-text class="text-center">
                {!! $insurance->search_text !!}
            </x-text>
            <div class="my-10 m-auto lg:w-[60%] space-y-10">
                @foreach($insuranceSearches as $search)
                    <div class="grid md:grid-cols-2 gap-4 lg:gap-12 items-center">
                        <img src="{{$search->getFirstMediaUrl()}}" class="m-auto w-full h-auto" />
                        <div>
                            {!! $search->text !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </x-row>

        <x-row>
            <x-text class="text-center">
                {!! $insurance->example_text !!}
            </x-text>
            <div class="my-10 m-auto lg:w-[80%] space-y-10">
                @foreach($insuranceExamples as $example)
                    <div class="md:grid md:grid-cols-4 rounded-md border border-slate-200">
                        <div class="bg-cover bg-no-repeat bg-center h-[200px] md:h-auto w-[100%] block md:w-auto" style="background-image: url('{{$example->getFirstMediaUrl()}}')"></div>
                        <div @class([
        "col-span-3 space-y-4 p-4",
        "md:order-first" => $loop->index % 2 != 0
])>
                            <x-title>{{$example->name}}</x-title>
                            <p>{!! $example->text !!}</p>
                            <p class="font-bold">{{$example->price}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-row>
    </x-container>
    <div class="w-full bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{$insurance->getFirstMediaurl('banner_one')}}')">
        <div class="absolute inset-0 m-auto bg-black bg-opacity-80"></div>
        <x-container class="text-white relative font-bold text-[30px] md:text-[50px] py-32">
            <div class="lg:w-[70%]">
                {!! $insurance->banner_one_text !!}
            </div>
        </x-container>
    </div>
    <x-container>
        <x-faq :faqs="$insuranceFaq" />
    </x-container>
    <div class="w-full bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{$insurance->getFirstMediaurl('banner_two')}}')">
        <div class="absolute inset-0 m-auto bg-black bg-opacity-80"></div>
        <x-container class="text-white relative font-bold text-[30px] md:text-[50px] py-32">
            <div class="lg:w-[70%]">
                {!! $insurance->banner_two_text !!}
            </div>
        </x-container>
    </div>
</x-app-layout>
