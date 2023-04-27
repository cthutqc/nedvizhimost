@if($actions)
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
        <div class="bg-slate-800 rounded p-2 lg:p-10 space-y-8">
            <x-title class="text-white">Выберите интересующую операцию с недвижимостью</x-title>
            <div class="flex flex-wrap">
                @foreach($actions as $action)
                    <button wire:click.prevent="setActiveAction({{$action->id}})"
                        @class([
                            "text-slate-200 text-lg hover:text-white border-b-4 border-b-slate-200 py-2 px-4",
                            "!text-white !border-b-red-500" => $action->id === $activeAction
                    ])>
                        {{$action->name}}</button>
                @endforeach
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($actionVariants ?:[] as $variant)
                    <div wire:click="setActiveVariant({{$variant->id}})" class="rounded bg-slate-100 p-4 relative hover:bg-slate-200 cursor-pointer">
                        <div class="flex items-center justify-between w-full">
                            <div>{{$variant->name}}</div>
                            <div class="text-right">
                        <span class="h-6 w-6 block bg-white rounded-full border border-slate-400 relative">
                            @if(isset($activeVariant[$activeAction]) && $variant->id === $activeVariant[$activeAction])
                                <span class="absolute inset-x-0 top-1/2 -translate-y-1/2 m-auto rounded-full bg-slate-900 h-4 w-4 block"></span>
                            @endif
                        </span>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(!isset($isOpen[$activeAction]))
                    <div wire:click="setOpen({{$activeAction}})" class="group rounded p-4 relative text-white relative border border-red-500 cursor-pointer">
                <span class="absolute inset-x-0 m-auto w-max top-1/2 -translate-y-1/2 group-hover:text-red-500">
                    Показать еще
                </span>
                    </div>
                @endif
            </div>
            <div class="lg:flex lg:justify-between space-y-4 lg:space-y-0 lg:space-x-4">
                <div class="w-full relative">
                    <input type="text"
                           wire:model="address"
                           placeholder="Для бесплатной оценки объекта введите адрес"
                        @class([
                             'rounded p-4 pl-12 w-full border border-slate-300 bg-transparent text-white',
                             'border-2 !border-red-500' => $errors->first('address'),
                         ]) />
                </div>
                <div class="w-full relative">
                    <input type="text"
                           wire:model="phone"
                           placeholder="Телефон"
                        @class([
                             'maskPhone rounded p-4 pl-12 w-full border border-slate-300 bg-transparent text-white',
                             'border-2 !border-red-500' => $errors->first('phone'),
                         ]) />
                </div>
                <div>
                    <button wire:click.prevent="send" class="bg-red-500 hover:bg-red-700 text-white border-2 border-red-500 hover:border-red-700 p-4 w-max block rounded">Оставить заявку</button>
                </div>
            </div>
            <div class="text-sm text-white">
                Нажимая кнопку «Оставить заявку», Вы соглашаетесь на обработку персональных данных.
            </div>
        </div>
    </div>
@endif
