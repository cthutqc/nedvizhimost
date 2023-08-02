<x-app-layout>
    <x-container>

        {{ Breadcrumbs::render('user', $user) }}

        <div class="flex justify-between mt-4 mb-10 items-center">
            <div class="flex space-x-4 lg:w-full">
                <div>
                    <img
                        src="{{count($user->getMedia()) ? $user->getFirstMediaUrl() : asset('images/user_placeholder.jpg')}}"
                        class="h-[240px]"
                    />
                </div>
                <div class="space-y-2 md:space-y-6">
                    <x-h1>{{$user->name}}<br>{{$user->last_name}}</x-h1>
                    <p class="text-slate-400">{{$user->user_position?->name}}</p>
                    <a href="tel:{{$user->phone}}" class="block md:hidden text-xl xl:text-3xl font-bold">{{$user->phone}}</a>
                </div>
            </div>
            <div class="hidden md:block text-right">
                <p class="text-slate-400">Рабочий телефон</p>
                <a href="tel:{{$user->phone}}" class="block text-xl xl:text-3xl font-bold">{{$user->phone}}</a>
            </div>
        </div>

        <hr>

        <livewire:objects
            :user="$user"
            :isBot="preg_match('/google|googlebot|Lighthouse/i', Request::userAgent()) ? true : false"/>

    </x-container>
</x-app-layout>
