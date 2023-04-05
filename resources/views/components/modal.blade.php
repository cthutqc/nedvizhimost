<div
    x-data="{
        show: @entangle($attributes->wire('model')).defer,
        search: @entangle($attributes->wire('model2')).defer
    }"
    x-show="show"
    x-on:keydown.escape.window="show = false"
    :class="{ 'block' : show , 'hidden' : !show}"
    class="hidden fixed z-[999] top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-60"
    x-transition
>
    <div x-show="show"
         @click.away="show = false"
         :class="{'fixed top-0 w-[96%] xl:w-[1280px] m-auto' : search, 'relative w-max md:p-6 lg:p-8 md:mx-0' : !search}"
         class="h-auto p-4 text-left bg-white border rounded-xl">
        {{$slot}}
        <a @click.prevent="show = false" href="#" class="absolute top-2 w-8 h-8 right-4 modal-close text-xl"><x-icons.close class="w-8 h-8"/></a>
    </div>
</div>
