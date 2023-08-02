<div class="w-full">
    <x-modal wire:model="show" wire:model2="search">
        <div class="my-10">
            <div>
                <x-title>Заказать дом</x-title>
                <div class="h-4 relative">
                    @if (session()->has('message'))
                        <div class="text-green-600">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="space-y-6">
                    <div class="w-full relative">
                        <input type="text"
                               wire:model="name"
                               placeholder="Ваше имя"
                            @class([
                                 'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                 'border-2 !border-red-500' => $errors->first('name'),
                             ]) />
                    </div>
                    <div class="w-full relative">
                        <input type="text"
                               wire:model="phone"
                               placeholder="Телефон"
                            @class([
                                 'maskPhone rounded-xl p-4 pl-12 w-full border border-slate-300',
                                 'border-2 !border-red-500' => $errors->first('phone'),
                             ]) />
                    </div>
                    <div class="text-center">
                        <button class="bg-red-500 hover:bg-red-700 rounded-xl py-4 w-full text-white m-auto" wire:click.prevent="send">Оставить заявку</button>
                    </div>
                    <div class="text-sm">
                        Нажимая кнопку «Оставить заявку»,<br> Вы соглашаетесь на<br>обработку персональных данных.
                    </div>
                </div>
            </div>
        </div>
    </x-modal>
</div>
