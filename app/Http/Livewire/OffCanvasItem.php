<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class OffCanvasItem extends Component
{
    public $item;

    protected $listeners = ['showOffCanvasItem' => 'show'];

    public function show($itemId)
    {
        dd(123);
        $this->item = Item::find($itemId);
        dd($this->item);
    }

    public function render()
    {
        return view('livewire.off-canvas-item');
    }
}
