<div
    x-data="{
                init () {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                @this.call('load')
                            }
                        })
                    }, {
                        root: null
                    });
                    observer.observe(this.$el);
                }
            }"
    class="mt-4 mb-10"
>
    <div wire:loading class="hidden sm:block text-center my-4 font-semibold block w-full">
        <div role="status" class="m-auto">
            <x-icons.spinner />
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
