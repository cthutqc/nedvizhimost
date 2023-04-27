<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Filter extends Component
{
    public $selected = [
        'category' => null,
        'rooms' => null,
    ];
    public $live = false;
    public $itemsCount = 0;
    public $categoryId;

    private $itemRepository;

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

        $this->selected['min'] = 100;
        $this->selected['max'] = 131243324;

        $this->emit('setSelected', $this->selected);
    }

    public function filter()
    {
        return redirect()->to('/categories/' . $this->selected['category']['slug']);
    }

    public function selectCategory($categoryId)
    {
        $this->selected['category'] = Category::find($categoryId)->toArray();

        if($this->live){
            return redirect()->to('/categories/' . $this->selected['category']['slug']);
        }

        $this->countItems();
    }

    public function countItems()
    {
        $this->itemsCount = $this->itemRepository->getAllItems($this->selected);
    }

    public function render()
    {
        $this->countItems();
        $this->emit('setSelected', $this->selected);
        return view('livewire.filter', [
            'categories' => Category::all(),
            'rooms' => Item::select('rooms')->orderBy('rooms')->where('category_id', $this->selected['category']['id'])->distinct()->get(),
        ]);
    }
}
