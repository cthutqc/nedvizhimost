<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Item;
use Illuminate\Support\Facades\Lang;

class ItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Item $item, SetMetaAction $action)
    {
        $action->handle($item);

        $attributes = collect([
            Lang::get('index.total_area') => $item->total_area ? $item->total_area . ' м2' : null,
            Lang::get('index.living_space') => $item->living_space ? $item->living_space . ' м2' : null,
            Lang::get('index.kitchen_area') => $item->kitchen_area ? $item->kitchen_area . ' м2' : null,
            Lang::get('index.land_area') => $item->land_area ? $item->land_area . ' сот.' : null,
            'Тип сделки' => $item->deal_type ? $item->deal_type->name  : null,
            Lang::get('index.rooms') => $item->rooms,
            Lang::get('index.floor') => $item->floor,
            Lang::get('index.floors') => $item->floors,

            Lang::get('index.renovation') => $item->renovation,
            Lang::get('index.window-view') => $item->{'window-view'},
            Lang::get('index.bathroom-unit') => $item->{'bathroom-unit'},
            Lang::get('index.balcony') => $item->balcony,
            Lang::get('index.floor-covering') => $item->{'floor-covering'} ? 'Есть' : null,
            Lang::get('index.air-conditioner') => $item->{'air-conditioner'} ? 'Есть' : null,
            Lang::get('index.phone') => $item->phone ? 'Есть' : null,
            Lang::get('index.guarded-building') => $item->{'guarded-building'} ? 'Есть' : null,
            Lang::get('index.access-control-system') => $item->{'access-control-system'} ? 'Есть' : null,
            Lang::get('index.lift') => $item->lift ? 'Есть' : null,
            Lang::get('index.rubbish-chute') => $item->{'rubbish-chute'} ? 'Есть' : null,
            Lang::get('index.flat-alarm') => $item->{'flat-alarm'} ? 'Есть' : null,
            Lang::get('index.alarm') => $item->alarm ? 'Есть' : null,
            Lang::get('index.toilet') => $item->toilet ? 'Есть' : null,
            Lang::get('index.ceiling-height') => $item->{'ceiling-height'} ? $item->{'ceiling-height'} .' м.' : null,
            Lang::get('index.built-year') => $item->{'built-year'},

        ]);

        return view('items.show', compact('item', 'attributes'));
    }
}
