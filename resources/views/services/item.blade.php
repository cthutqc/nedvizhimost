<a href="{{route('services.show', $service)}}"
    class="rounded-xl overflow-hidden p-10 h-[370px]"
    style="background-color: {{$service->color ?? '#eeeeee'}}">
    <span class="font-semibold text-xl">{{$service->name}}</span>
</a>
