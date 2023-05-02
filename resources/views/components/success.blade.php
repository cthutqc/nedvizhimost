<div x-data="{show : false}" @success-show.window="show = true">
    <div x-show="show"
         :class="{ 'hidden' : !show, 'block' : show}"
         class="hidden fixed inset-0 block bg-black bg-opacity-80 z-[9999]">
        <div @click.away="show = !show" class="bg-slate-100 rounded p-10 text-center p-10 absolute top-1/2 -translate-y-1/2 inset-x-0 w-max m-auto">
            <x-row>
                <div class="space-y-4">
                    <x-title>Заявка успешно отправлена.</x-title>
                    <p>Наш менеджер свяжется с вами в ближайшее время</p>
                    <button @click.prevent="show = false" class="p-4 m-auto block text-white rounded  bg-red-500 hover:bg-red-700">Закрыть</button>
                </div>
            </x-row>
            <a @click.prevent="show = false" href="#" class="absolute top-2 w-8 h-8 right-4 modal-close text-xl"><x-icons.close class="w-8 h-8"/></a>
        </div>
    </div>
</div>
