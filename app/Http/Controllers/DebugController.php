<?php

namespace App\Http\Controllers;

use App\BitrixService;
use App\Console\Commands\ImportObjects;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $import = new ImportObjects();

        $import->handle();
    }
}
