<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    /**
     * @param $amount
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getItems($amount, $selected = null): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->getItems($amount, $selected)
            ->get();
    }

    /**
     * @param $category
     * @return int
     */
    public function getAllItems($selected = null): int
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
