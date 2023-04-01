<?php

namespace App\Http\Controllers;


use Abordage\LastModified\Facades\LastModified;
use App\Models\Page;
use App\Models\Setting;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Page $page)
    {
        $title = $page->meta_title ?: (Setting::where('code', 'page_title')->first() ? str_replace('{NAME}', $page->name, Setting::where('code', 'page_title')->first()->value) : $page->name);

        $description = $page->meta_description ?: (Setting::where('code', 'page_description')->first() ? str_replace('{NAME}', $page->name, Setting::where('code', 'page_description')->first()->value) : $page->name);

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($page->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);

        return view('pages.show', compact('page'));
    }
}
