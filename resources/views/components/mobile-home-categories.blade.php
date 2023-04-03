<x-row class="lg:hidden">
    <div class="grid grid-cols-2 gap-4">
        @foreach($categories as $category)
            <a href="{{route('categories.show', $category)}}" class="p-10 text-center shadow-md">{{$category->name}}</a>
        @endforeach
    </div>
</x-row>
