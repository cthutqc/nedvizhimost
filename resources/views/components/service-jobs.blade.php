@props([
    'service_jobs' => $serviceJobs,
])
@if($service_jobs->count())
    <x-row>
        <x-title>Как мы работаем</x-title>
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-4">
            @foreach($service_jobs as $service_job)
                <div class="rounded-md border bg-slate-50">
                    <div class="h-[300px] w-full block bg-cover bg-no-repeat bg-top" style="background-image: url('{{$service_job->getFirstMediaUrl()}}')"></div>
                    <div class="p-4">
                        <p class="text-xl font-bold">{{$service_job->name}}</p>
                        <p>{!! $service_job->text !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-row>
@endif
