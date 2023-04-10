<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Objects extends Component
{
    public Category $category;
    public $amount;
    public $isBot;
    public $totalItems;
    private $itemRepository;
    public $selected;

    protected $listeners = ['setSelected'];

    public function setSelected($selected)
    {
        $this->selected = $selected;
    }

    public function boot()
    {
        $this->itemRepository = App::make(ItemRepository::class);
    }

    public function mount($isBot = false)
    {
        $this->isBot = $isBot;
        $this->isBot ? $this->amount = 16 : $this->amount = 32;
        $this->selected['category'] = $this->category->toArray();
    }

    public function render()
    {
        $this->totalItems = $this->itemRepository->getAllItems($this->selected);

        $items = $this->itemRepository->getItems($this->amount, $this->selected);

        $this->selected['min_price'] = $items->min('price');

        $this->selected['max_price'] = $items->max('price');

        return view('livewire.objects', [
            'items' => $items,
        ]);
    }

    public function load()
    {
        $this->amount += 32;
    }
}
