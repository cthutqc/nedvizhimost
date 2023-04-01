<?php

namespace App\Http\Controllers;

use Abordage\LastModified\Facades\LastModified;
use App\Models\Item;
use App\Models\Setting;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;

class ItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Item $item)
    {
        $title = $item->meta_title ?: (Setting::where('code', 'item_title')->first() ? str_replace('{NAME}', $item->name, Setting::where('code', 'item_title')->first()->value) : $item->name);

        $description = $item->meta_description ?: (Setting::where('code', 'item_description')->first() ? str_replace('{NAME}', $item->name, Setting::where('code', 'item_description')->first()->value) : $item->name);

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($item->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);

        return view('items.show', compact('item'));
    }
}
