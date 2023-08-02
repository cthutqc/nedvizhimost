<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\DealType;
use App\Models\Item;
use App\Models\ItemType;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Component;

class Filter extends Component
{
    public $selected = [
        'category' => null,
        'rooms' => [],
        'min' => 0,
        'max' => 0,
        'deal_type' => null,
        'item_type' => null,
    ];
    public $live = false;
    public $itemsCount = 0;
    public $categoryId;
    public $is_home = false;

    public $min = 0;

    public $max = 0;

    public $preloadItems;

    public $rooms;

    public $items;

    public $dealTypes;

    public $itemTypes;

    private $itemRepository;

    protected $listeners = ['setMin'];

    public function showOffCanvasFilter():void
    {
        $this->emit('showFilter', $this->selected);
    }

    public function boot():void
    {
        $this->itemRepository = App::make(ItemRepository::class);
    }

    public function mount($is_home = false, $category = null):void
    {
        $this->is_home = $is_home;

        if($category) {
            $this->live = true;
            $this->categoryId = $category;
            if(Session::has('filter'))
                $this->selected = Session::get('filter');
            else
                $this->selected['category'] = Category::find($category->id)->toArray();
        }
        else {
            $this->selected['category'] = Category::find(1)->toArray();
        }

        if(!$this->is_home) {
            $this->preloadItems = Item::query()
                ->where('category_id', $category->id)
                ->get();
        }

        $this->emit('setSelected', $this->selected);

    }

    public function liveDealType($id):void
    {
        $this->selected['deal_type'] = DealType::find($id)->toArray();
    }

    public function liveItemType($id):void
    {
        $this->selected['item_type'] = ItemType::find($id)->toArray();
    }

    public function filter()
    {
        Session::put('filter', $this->selected);

        return redirect()->to('/categories/' . $this->selected['category']['slug']);
    }

    public function liveCategory($categoryId)
    {

        $this->selected['category'] = Category::find($categoryId)->toArray();

        if($this->live){
            return redirect()->to('/categories/' . $this->selected['category']['slug']);
        }
    }

    public function countItems():void
    {
        $this->itemsCount = $this->itemRepository->getItemsCount($this->selected);
    }

    public function getItems():void
    {
        if($this->is_home){

            $this->preloadItems = Item::query()
                ->where('category_id', $this->selected['category']['id'])
                ->get();

        }

        $this->items = $this->itemRepository->getAllItems($this->selected);

        $this->itemsCount = $this->items->count();

        $this->rooms = $this->preloadItems->unique('rooms')->sortBy('rooms');

        $this->dealTypes = DealType::whereHas('items', function ($q){
            $q->whereIn('id', $this->preloadItems->pluck('id')->toArray());
        })->get();

        $this->itemTypes = ItemType::whereHas('items', function ($q){
            $q->whereIn('id', $this->preloadItems->pluck('id')->toArray());
        })->get();

        $this->emit('setSelected', $this->selected);
    }

    public function setMin($price):void
    {
        $this->selected['min'] = $price;
    }

    public function setMax($price):void
    {
        $this->selected['max'] = $price;
    }

    public function render():View
    {
        if($this->selected['rooms'])
            $this->selected['rooms'] = array_filter($this->selected['rooms']);

        $this->getItems();

        return view('livewire.filter', [
            'categories' => Category::all(),
        ]);
    }
}
