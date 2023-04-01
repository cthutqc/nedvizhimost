<div x-data="{scrollBackTop: false}" x-cloak>
    <button
        x-show="scrollBackTop"
        x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
        x-on:click="window.scroll({ top:0, left:0, behavior: 'smooth'})"
        aria-label="Back to top"
        class="hidden sm:block fixed right-10 bottom-10 z-50 h-12 w-12 bg-blue-200 shadow-lg rounded-full">
        <x-icons.top />
    </button>
</div>
