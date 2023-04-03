<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistItem extends Component
{
    public $inWishlist = false;
    public $itemId;

    public function mount($itemId)
    {
        $this->itemId = $itemId;
    }

    public function wish()
    {
        Auth::user()->wish(Item::find($this->itemId), 'wishlist');
    }

    public function unwish()
    {
        Auth::user()->unwish(Item::find($this->itemId), 'wishlist');
        $this->emit('unwishIt');
    }

    public function render()
    {
        if(auth()->check())
        {
            $this->inWishlist = auth()->user()->wishlist('wishlist')->where('id', $this->itemId)->first();
        }

        return view('livewire.wishlist-item');
    }
}
