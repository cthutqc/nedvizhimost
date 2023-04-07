<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Filter extends Component
{
    public $selected;
    public $live = false;
    public $itemsCount = 0;
    private $itemRepository;
    public $categoryId;

    public function boot()
    {
        $this->itemRepository = App::make(ItemRepository::class);
    }

    public function mount($category = null)
    {
        if($category) {
            $this->live = true;
            $this->categoryId = $category;
            $this->selected['category'] = Category::find($category->id);
        }
        else {
            $this->selected['category'] = Category::find(1);
        }
    }

    public function filter()
    {
        return redirect()->to('/categories/' . $this->selected['category']['slug']);
    }

    public function selectCategory($categoryId)
    {
        $this->selected['category'] = Category::find($categoryId);

        if($this->live){
            return redirect()->to('/categories/' . $this->selected['category']['slug']);
        }

        $this->countItems();
    }

    public function countItems()
    {
        $this->itemsCount = $this->itemRepository->getAllItems($this->selected['category']);
    }

    public function render()
    {
        $this->countItems();

        return view('livewire.filter', [
            'categories' => Category::all(),
        ]);
    }
}
