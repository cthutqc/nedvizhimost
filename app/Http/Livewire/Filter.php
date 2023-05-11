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
        'rooms' => [],
        'min' => null,
        'max' => null,
    ];
    public $live = false;
    public $itemsCount = 0;
    public $categoryId;
    public $min;
    public $max;
    public $is_home = false;

    private $itemRepository;

    public function showFilter()
    {

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
        $this->emit('setSelected', $this->selected);
    }

    public function setMin($price)
    {
        $this->selected['min'] = $price;
    }

    public function setMax($price)
    {
        $this->selected['max'] = $price;
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
        $this->itemsCount = $this->itemRepository->getItemsCount($this->selected);
    }

    public function render()
    {
        if($this->selected['rooms'])
            $this->selected['rooms'] = array_filter($this->selected['rooms']);

        $this->countItems();

        $this->itemsCount = $this->itemRepository->getItemsCount($this->selected);

        $this->emit('setSelected', $this->selected);


        $items = $this->itemRepository->getAllItems($this->selected);

        $this->min = $items->min('price');

        $this->max = $items->max('price');

        return view('livewire.filter', [
            'categories' => Category::all(),
            'rooms' => Item::select('rooms')->orderBy('rooms')->where('category_id', $this->selected['category']['id'])->distinct()->get(),
        ]);
    }
}
