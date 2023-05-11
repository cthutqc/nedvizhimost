<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class MapSearch extends Component
{

    private $itemRepository;

    public $selected = [
        'category' => null,
        'rooms' => null,
        'min' => null,
        'max' => null,
    ];

    public $offCanvasItem;

    protected $listeners = ['showOffCanvasItem'];

    public function showOffCanvasItem($itemId)
    {
        $this->offCanvasItem = Item::find($itemId);
    }

    public function boot()
    {
        $this->itemRepository = App::make(ItemRepository::class);
    }

    public function mount($category = null)
    {
        if($category) {
            $this->live = true;
            $this->categoryId = $category;
            $this->selected['category'] = Category::find($category->id)->toArray();
        }
        else {
            $this->selected['category'] = Category::find(1)->toArray();
        }
        //$this->emit('setSelected', $this->selected);
    }

    public function render()
    {
        $items = $this->itemRepository->getItems(null, $this->selected);

        return view('livewire.map-search', [
            'items' => $items
        ]);
    }
}
