<?php

namespace App\Observers;

use App\Models\Item;

class ItemObserver
{
    public function creating(Item $item)
    {
        $item->name = $item->rooms . '-комнатная, ' . $item->floor . '/' . $item->floors . 'эт., ' . $item->total_area . 'м²';
    }
}
