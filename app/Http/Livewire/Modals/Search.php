<?php

namespace App\Http\Livewire\Modals;

use App\Http\Livewire\Modal;
use App\Models\Item;
use App\Repositories\ItemRepository;

class Search extends Modal
{
    public $searchString;

    public function render()
    {
        $itemRepository = new ItemRepository();

        if($this->searchString) {
            $items = $itemRepository->searchItems($this->searchString);
        }

        return view('livewire.modals.search', [
            'items' => $items ?? null
        ]);
    }
}
