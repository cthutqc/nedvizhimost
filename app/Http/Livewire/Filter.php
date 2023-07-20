<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\DealType;
use App\Models\Item;
use App\Models\ItemType;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Filter extends Component
{
    public $selected = [
        'category' => null,
        'rooms' => [],
        'min' => 1,
        'max' => 10000000000000000000000000,
        'deal_type' => null,
        'item_type' => null,
    ];
    public $live = false;
    public $itemsCount = 0;
    public $categoryId;
    public $is_home = false;

    public $min;

    public $max;

    public $rooms;

    public $items;

    public $dealTypes;

    public $itemTypes;

    private $itemRepository;

    public function showOffCanvasFilter()
    {
        $this->emit('showFilter', $this->selected);
    }

    public function boot()
    {
        $this->itemRepository = App::make(ItemRepository::class);
    }

    public function mount($is_home = false, $category = null)
    {
        $this->is_home = $is_home;

        if($category) {
            $this->live = true;
            $this->categoryId = $category;
            $this->selected['category'] = Category::find($category->id)->toArray();
        }
        else {
            $this->selected['category'] = Category::find(1)->toArray();
        }

        $items = $this->itemRepository->getAllItems($this->selected);

        $this->dealTypes = DealType::whereHas('items', function ($q) use ($items){
            $q->whereIn('id', $items->pluck('id')->toArray());
        })->get();

        $this->itemTypes = ItemType::whereHas('items', function ($q) use ($items){
            $q->whereIn('id', $items->pluck('id')->toArray());
        })->get();

        $this->rooms = $items->unique('rooms')->sortBy('rooms');

        $this->emit('setSelected', $this->selected);
    }

    public function liveDealType($id)
    {
        $this->selected['deal_type'] = DealType::find($id)->toArray();
    }

    public function liveItemType($id)
    {
        $this->selected['item_type'] = ItemType::find($id)->toArray();
    }

    public function filter()
    {
        return redirect()->to('/categories/' . $this->selected['category']['slug']);
    }

    public function liveCategory($categoryId)
    {
        $this->selected['category'] = Category::find($categoryId)->toArray();

        if($this->live){
            return redirect()->to('/categories/' . $this->selected['category']['slug']);
        }
    }

    public function countItems()
    {
        $this->itemsCount = $this->itemRepository->getItemsCount($this->selected);
    }

    public function getItems()
    {
        $this->items = $this->itemRepository->getAllItems($this->selected);

        $this->itemsCount = $this->items->count();

        $this->emit('setSelected', $this->selected);
    }

    public function render()
    {
        if($this->selected['rooms'])
            $this->selected['rooms'] = array_filter($this->selected['rooms']);

        $this->getItems();

        $this->selected['min'] = $this->min;

        $this->selected['max'] = $this->max;

        return view('livewire.filter', [
            'categories' => Category::all(),
        ]);
    }
}
