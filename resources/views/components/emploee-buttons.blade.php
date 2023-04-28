@props([
    'phone' => $phone
])
<hr>
<div class="flex justify-between space-x-1 items-center relative">
    <a href="tel:{{$phone}}" class="flex items-center justify-center space-x-1 border border-slate-300 rounded-md py-2 w-full hover:bg-red-500 hover:border-red-500 hover:text-white">
        <x-icons.phone class="h-5 w-5"/><span>Позвонить</span>
    </a>
    <button class="flex items-center justify-center space-x-1 border border-slate-300 rounded-md py-2 w-full hover:bg-red-500 hover:border-red-500 hover:text-white">
        <x-icons.mail class="h-5 w-5"/><span>Написать</span>
    </button>
</div>
