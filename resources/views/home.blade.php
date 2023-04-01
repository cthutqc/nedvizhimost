<x-app-layout>
    <div class="w-full relative bg-cover bg-no-repeat bg-top" style="background-image: url({{asset('images/home.jpg')}})">
        <div class="absolute inset-0 bg-cover bg-black bg-opacity-30"></div>
        <x-container class="h-[440px]">
            <div class="absolute top-1/2 -translate-y-1/2 m-auto block">
                <p class="text-[50px] text-white font-bold">Поможем продать<br> и купить недвижимость</p>
            </div>
        </x-container>
    </div>
    <x-container>
        <x-row>
            <x-new-objects-slider />
        </x-row>
    </x-container>
</x-app-layout>
