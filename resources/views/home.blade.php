<x-app-layout>
    <div class="w-full block relative bg-cover bg-no-repeat bg-top" style="background-image: url({{asset('images/home.jpg')}})">
        <div class="absolute inset-0 bg-cover bg-black bg-opacity-30"></div>
        <x-container class="h-[440px]">
            <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 px-4 md:px-10 block w-full">
                <p class="text-[40px] lg:text-[50px] text-white font-bold">Поможем продать<br> и купить недвижимость</p>
            </div>
        </x-container>
    </div>
    <x-container>
        <x-mobile-home-categories />
        <x-new-objects-slider />
    </x-container>
</x-app-layout>
