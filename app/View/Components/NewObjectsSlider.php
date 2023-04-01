<?php

namespace App\View\Components;

use App\Models\Item;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewObjectsSlider extends Component
{
    public $items;

    public function __construct()
    {
        $this->items = Item::take(12)->orderBy('created_at')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new-objects-slider');
    }
}
