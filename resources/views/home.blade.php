<x-app-layout>
    <div class="w-full block relative bg-cover bg-no-repeat bg-top z-20" style="background-image: url({{asset('images/home.jpg')}})">
        <div class="absolute inset-0 bg-cover bg-black bg-opacity-30"></div>
        <x-container class="h-[440px]">
            <div class="w-auto absolute left-4 right-4 md:left-10 md:right-10 xl:left-20 xl:right-20 top-1/2 -translate-y-1/2 block w-full">
                <p class="text-[40px] lg:text-[50px] text-white font-bold">Поможем продать<br> и купить недвижимость</p>
                <livewire:filter :is_home="true"/>
            </div>
        </x-container>
    </div>
    <x-container>
        <x-mobile-home-categories />
        <x-new-objects-slider />
        <livewire:actions />
        <x-reviews />
    </x-container>
</x-app-layout>
