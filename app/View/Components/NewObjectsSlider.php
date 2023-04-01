<?php

namespace App\View\Components;

use App\Models\Item;
use App\Repositories\ItemRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class NewObjectsSlider extends Component
{
    public $items;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->items = $itemRepository->getItems(12);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new-objects-slider');
    }
}
