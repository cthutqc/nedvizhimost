<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    public function getCategoryItems($category, $amount): \Illuminate\Database\Eloquent\Collection|array
    {
        return Item::query()
            ->where('category_id', $category->id)
            ->when($amount, function ($q) use ($amount) {
                $q->take($amount);
            })
            ->orderBy('price')
            ->select(['price', 'address', 'slug'])
            ->with('media')
            ->inRandomOrder()
            ->get();
    }

    public function getAllItems($category): int
    {
        return Item::query()
            ->where('category_id', $category->id)
            ->count();
    }
}
