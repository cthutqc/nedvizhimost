<div class="group/item overflow-hidden border p-6 border-slate-100 hover:shadow-lg rounded-xl relative space-y-4">
    <a href="{{route('employees.show', $user)}}" class="flex space-x-4">
        <div>
            <img
                src="{{count($user->getMedia()) ? $user->getFirstMediaUrl() : asset('images/user_placeholder.jpg')}}"
                class="h-[140px]"
            />
        </div>
        <div class="space-y-4">
            <p class="font-bold text-xl">{{$user->name}}<br>{{$user->last_name}}</p>
            <p class="text-slate-400">{{$user->user_position->name}}</p>
            <p class="block font-bold text-lg">{{$user->phone}}</p>
        </div>
    </a>
    <hr>
    <div class="flex justify-between space-x-1 items-center relative">
        <a href="tel:{{$user->phone}}" class="flex items-center justify-center space-x-1 border border-slate-300 rounded-md py-2 w-full hover:bg-red-500 hover:border-red-500 hover:text-white">
            <x-icons.phone class="h-5 w-5"/><span>Позвонить</span>
        </a>
        <button class="flex items-center justify-center space-x-1 border border-slate-300 rounded-md py-2 w-full hover:bg-red-500 hover:border-red-500 hover:text-white">
            <x-icons.mail class="h-5 w-5"/><span>Написать</span>
        </button>
    </div>
</div>
