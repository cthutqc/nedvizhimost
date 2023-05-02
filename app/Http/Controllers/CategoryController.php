<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category, SetMetaAction $action)
    {

        $action->handle($category);

        return view('categories.show', compact('category'));
    }
}
