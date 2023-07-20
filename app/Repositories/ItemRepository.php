<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    /**
     * @param $amount
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getItems($amount = null, $selected = null): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->getItems($amount, $selected)
            ->get();
    }

    public function getAllItems($selected = null): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->with(['deal_type', 'item_type'])
            ->getItems(null, $selected)
            ->get();
    }

    /**
     * @param $category
     * @return int
     */
    public function getItemsCount($selected = null): int
    {
        return Item::query()
            ->getItems(null, $selected)
            ->count();
    }

    public function searchItems($search): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->orderBy('price')
            ->select('name', 'price', 'address', 'slug')
            ->with(['media'])
            ->where( 'address', 'like', '%' . $search . '%')
            ->take(12)
            ->get();
    }
}
