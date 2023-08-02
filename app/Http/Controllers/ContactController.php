<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SetMetaAction $action)
    {
        $page = Page::where('slug', 'contacts')->firstOrFail();

        $contacts = Setting::query()
            ->whereIn('code', ['phone', 'email', 'address'])
            ->get();

        $action->handle($page);

        return view('pages.contacts', compact('page', 'contacts'));
    }
}
