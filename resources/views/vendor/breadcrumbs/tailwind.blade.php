@unless ($breadcrumbs->isEmpty())
    <nav class="container mx-auto">
        <ol class="py-4 rounded flex flex-wrap text-sm">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li class="text-slate-500">
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="px-2">
                        /
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
