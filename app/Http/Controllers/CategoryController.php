<?php

namespace App\Http\Controllers;

use Abordage\LastModified\Facades\LastModified;
use App\Models\Category;
use App\Models\Item;
use App\Models\Setting;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Butschster\Head\Packages\Entities\TwitterCardPackage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {

        $title = $category->meta_title ?: (Setting::where('code', 'category_title')->first() ? str_replace('{NAME}', $category->name, Setting::where('code', 'category_title')->first()->value) : $category->name);

        $description = $category->meta_description ?: (Setting::where('code', 'category_description')->first() ? str_replace('{NAME}', $category->name, Setting::where('code', 'category_description')->first()->value) : $category->name);

        Meta::setTitle(env('APP_NAME'))
            ->prependTitle($title)
            ->setDescription($description)
            ->setCanonical(url()->current());

        LastModified::set($category->updated_at);

        $og = new OpenGraphPackage('og');

        $og->setTitle($title)
            ->setDescription($description)
            ->setUrl(url()->current());

        Meta::registerPackage($og);

        $card  = new TwitterCardPackage('card');

        Meta::registerPackage($card);

        return view('categories.show', compact('category'));
    }
}
