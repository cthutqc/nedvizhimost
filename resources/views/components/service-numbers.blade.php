@props([
    'service_numbers' => $serviceNumbers,
    'color' => $color
])
@if($service_numbers->count())
    <x-row>
        <x-title>Что включает</x-title>
        <div class="lg:flex justify-start lg:space-x-2 space-y-4 lg:space-y-0">
            @foreach($service_numbers as $number)
                <div @class([
                        "md:border-r md:px-2 md:border-r-slate-200 space-y-4",
                        "md:border-r-transparent" => $loop->last
                ])>
                    <div class="bg-opacity-80 font-semibold px-4 py-2 rounded block w-max" style="background-color: {{$color}}">
                        {{$loop->iteration}}
                    </div>
                    <p>{{$number->name}}</p>
                </div>
            @endforeach
        </div>
    </x-row>
@endif
