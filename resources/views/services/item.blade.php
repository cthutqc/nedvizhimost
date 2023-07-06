<a href="{{route('services.show', $service)}}"
    class="rounded-xl overflow-hidden p-10 h-[370px] bg-cover bg-no-repeat"
    style="background-color: {{$service->color ?? '#eeeeee'}}; background-image: url('{{$service->getFirstMediaUrl()}}')">
    <span class="font-semibold text-xl">{{$service->name}}</span>
</a>
