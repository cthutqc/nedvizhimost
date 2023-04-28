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
    <x-emploee-buttons :phone="$user->phone" />
</div>
