<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Page;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(SetMetaAction $action)
    {
        $page = Page::where('slug', 'services')->first();

        $action->handle($page);

        $services = Service::all();

        return view('services.index', compact('services', 'page'));
    }

    public function show(Service $service, SetMetaAction $action)
    {
        $action->handle($service);

        return view('services.show', compact('service'));
    }
}
