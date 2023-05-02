<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Item $item, SetMetaAction $action)
    {
        $action->handle($item);

        $attributes = collect([
            'Общая площадь' => $item->total_area ? $item->total_area . ' м2' : null,
            'Жилая площадь' => $item->living_space ? $item->living_space . ' м2' : null,
            'Площадь кухни' => $item->kitchen_area ? $item->kitchen_area . ' м2' : null,
            'Площадь участка' => $item->land_area ? $item->land_area . ' сот.' : null,
            'Тип сделки' => $item->deal_type ? $item->deal_type->name  : null,
            'Количество комнат' => $item->rooms,
            'Этаж' => $item->floor,
            'Этажность' => $item->floors,
        ]);

        return view('items.show', compact('item', 'attributes'));
    }
}
