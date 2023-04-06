<div x-data="{open:false}">
    <div>
        @auth
            @if($inWishlist)
                <button wire:click.prevent="unwish">
                    <x-icons.wishlist class="fill-white h-4 w-4" />
                </button>
            @else
                <button wire:click.prevent="wish">
                    <x-icons.wishlist class="fill-white h-4 w-4" />
                </button>
            @endif
        @else
            <button x-on:click.prevent="window.livewire.emitTo('modals.login', 'show')">
                <x-icons.wishlist class="fill-white h-4 w-4" />
            </button>
        @endauth
    </div>
</div>
