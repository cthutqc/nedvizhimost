<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    /**
     * @param $amount
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getItems($amount): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->when($amount, function ($q) use ($amount) {
                $q->take($amount);
            })
            ->select(['price', 'address', 'slug', 'total_area', 'floor', 'floors', 'rooms'])
            ->with('media')
            ->orderBy('created_at')
            ->get();
    }

    /**
     * @param $category
     * @param $amount
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getCategoryItems($category, $amount): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->where('category_id', $category->id)
            ->when($amount, function ($q) use ($amount) {
                $q->take($amount);
            })
            ->orderBy('price')
            ->select(['price', 'address', 'slug', 'total_area', 'floor', 'floors', 'rooms'])
            ->with('media')
            ->inRandomOrder()
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
}
