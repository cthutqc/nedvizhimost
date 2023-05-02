<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Page $page, SetMetaAction $action)
    {
        $action->handle($page);

        return view('pages.show', compact('page'));
    }
}
