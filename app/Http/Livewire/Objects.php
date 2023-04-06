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

    public function mount($isBot = false)
    {
        $this->isBot = $isBot;
        $this->isBot ? $this->amount = 16 : $this->amount = 32;
    }

    public function render()
    {
        $itemRepository = App::make(ItemRepository::class);

        $this->totalItems = $itemRepository->getAllItems($this->category);

        $items = $itemRepository->getItems($this->amount, $this->category);

        return view('livewire.objects', [
            'items' => $items,
        ]);
    }

    public function load()
    {
        $this->amount += 32;
    }
}
