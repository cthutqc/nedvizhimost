<div class="w-full">
    <x-modal wire:model="show" wire:model2="search">
        <div class="my-10">
            @if($loginPage)
                <div>
                    <x-title>Личный кабинет</x-title>
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
                                   wire:model="email"
                                @class([
                                     'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                     'border-2 !border-red-500' => $errors->first('email'),
                                 ])
                                   placeholder="Email">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                                <x-icons.profile />
                            </span>
                        </div>
                        <div class="w-full relative">
                            <input type="password"
                                   wire:model="password"
                                @class([
                                     'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                     'border-2 !border-red-500' => $errors->first('password'),
                                 ])
                                   placeholder="Пароль">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                                <x-icons.password />
                            </span>
                        </div>
                        <div class="text-center">
                            <button class="bg-red-500 hover:bg-red-700 rounded-xl py-4 w-full text-white m-auto" wire:click.prevent="login">Войти</button>
                        </div>
                        <div>
                            <button wire:click.prevent="openRegisterPage">Регистрация</button>
                        </div>
                    </div>
                </div>
            @elseif($registerPage)
                <div>
                    <x-title>Регистрация</x-title>
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
                                   @class([
                                        'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                        'border-2 !border-red-500' => $errors->first('name'),
                                    ])
                                   placeholder="Имя">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                                <x-icons.profile />
                            </span>
                        </div>
                        <div class="w-full relative">
                            <input type="text"
                                   wire:model="email"
                                   @class([
                                        'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                        'border-2 !border-red-500' => $errors->first('email'),
                                    ])
                                   placeholder="Email">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                                <x-icons.profile />
                            </span>
                        </div>
                        <div class="w-full relative">
                            <input type="password"
                                   wire:model="password"
                                   @class([
                                        'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                        'border-2 !border-red-500' => $errors->first('password'),
                                    ])
                                   placeholder="Пароль">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                                <x-icons.password />
                            </span>
                        </div>
                        <div class="w-full relative">
                            <input type="password"
                                   wire:model="password_confirmation"
                                   @class([
                                        'rounded-xl p-4 pl-12 w-full border border-slate-300',
                                        'border-2 !border-red-500' => $errors->first('password_confirmation'),
                                    ])
                                   placeholder="Повторите пароль">
                            <span class="absolute left-2 top-1/2 -translate-y-1/2 h-8 w-8">
                                <x-icons.password_confirmation />
                            </span>
                        </div>
                        <div class="text-center">
                            <button class="bg-red-500 hover:bg-red-700 rounded-xl py-4 w-full text-white m-auto" wire:click.prevent="register">Регистрация</button>
                        </div>
                        <div>
                            <button wire:click.prevent="openLoginPage">Уже есть аккаунт? Войти</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-modal>
</div>
