@props([
    'faqs' => $faqs
])
@if($faqs->count())
    <x-row>
        <x-title>Вопрос ответ</x-title>
        <div x-data="{ selected : null }">
            @foreach($faqs as $faq)
                <div class="w-full border-b border-b-slate-300 p-4">
                    <a @click.prevent="selected !== {{$faq->id}} ? selected = {{$faq->id}} : selected = null" href="" class="text-lg font-semibold">{{$faq->question}}</a>
                    <div x-show="selected == {{$faq->id}}" class="pt-4 transition-all duration-700">
                        {!! $faq->answer !!}
                    </div>
                </div>
            @endforeach
        </div>
    </x-row>
@endif
