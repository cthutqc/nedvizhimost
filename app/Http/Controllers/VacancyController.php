<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Page;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SetMetaAction $action)
    {
        $page = Page::where('slug', 'vacancies')->firstOrFail();

        $action->handle($page);

        $vacancies = Vacancy::all();

        return view('vacancies.index', compact('vacancies', 'page'));
    }
}
