<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    /**
     * @param $amount
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getItems($amount, $category = null): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->getItems($amount, $category)
            ->get();
    }

    /**
     * @param $category
     * @return int
     */
    public function getAllItems($category): int
    {
        return Item::query()
            ->where('category_id', $category->id)
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
