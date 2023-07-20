<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\DealType;
use App\Models\ItemType;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Livewire\Component;

class OffCanvasFilter extends Component
{
    public $categories;
    public $itemTypes;
    private $itemRepository;
    public $itemsCount;
    public $items;
    public $dealTypes;
    public $rooms;
    public $selected = [
        'category' => null,
        'rooms' => null,
        'min' => null,
        'max' => null,
        'deal_type' => null,
        'item_type' => null,
    ];
    protected $listeners = ['setSelected'];

    public function setCategory($id):void
    {
        $this->selected['category'] = Category::find($id)->toArray();

        $this->getItems();

    }

    public function boot():void
    {
        $this->itemRepository = App::make(ItemRepository::class);
    }

    public function setSelected($selected):void
    {
        $this->selected = $selected;
    }

    public function mount(array $selected, $rooms, $categories, $itemTypes, $dealTypes):void
    {
        $this->selected = $selected;

        $this->rooms = $rooms;

        $this->categories = $categories;

        $this->itemTypes = $itemTypes;

        $this->dealTypes = $dealTypes;

    }

    public function selectDealType($id):void
    {
        $this->selected['deal_type'] = DealType::find($id)->toArray();
    }

    public function selectItemType($id):void
    {
        $this->selected['item_type'] = ItemType::find($id)->toArray();
    }

    public function getItems():void
    {
        $this->items = $this->itemRepository->getAllItems($this->selected);

        $this->itemsCount = $this->items->count();
    }

    public function render():View
    {
        if($this->selected['rooms'])
            $this->selected['rooms'] = array_filter($this->selected['rooms']);


        $this->getItems();

        return view('livewire.off-canvas-filter');
    }
}
