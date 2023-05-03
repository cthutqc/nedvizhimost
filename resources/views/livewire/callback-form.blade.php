<x-row>
    <x-success />
    <div class="border border-slate-300 rounded-xl overflow-hidden bg-slate-100 px-10 py-16 grid lg:grid-cols-4">
        <div class="lg:col-span-3">
            <x-title>
                Мы вам перезвоним
            </x-title>
            <p class="my-4">Оставьте вашу контактную информацию, чтобы мы связались
                с вами и ответили на все интересующие вас вопросы.</p>
            <div class="md:flex md:space-x-4 space-y-4 md:space-y-0">
                <div class="w-full relative">
                    <input type="text"
                           wire:model="name"
                           placeholder="Bvz"
                        @class([
                             'rounded p-4 pl-12 w-full border border-slate-300 bg-white',
                             'border-2 !border-red-500' => $errors->first('name'),
                         ]) />
                </div>
                <div class="w-full relative">
                    <input type="text"
                           wire:model="phone"
                           placeholder="Телефон"
                        @class([
                             'maskPhone rounded p-4 pl-12 w-full border border-slate-300 bg-white',
                             'border-2 !border-red-500' => $errors->first('phone'),
                         ]) />
                </div>
                <div>
                    <button wire:click.prevent="send" class="bg-red-500 hover:bg-red-700 text-white border-2 border-red-500 hover:border-red-700 p-4 w-max block rounded">Оставить заявку</button>
                </div>
            </div>
            <div class="text-sm">
                Нажимая кнопку «Оставить заявку», Вы соглашаетесь на обработку персональных данных.
            </div>
        </div>
        <div></div>
    </div>
</x-row>
