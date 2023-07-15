<?php

namespace App\Http\Controllers;

use App\Actions\SetMetaAction;
use App\Models\Insurance;
use App\Models\InsuranceAdvantage;
use App\Models\InsuranceError;
use App\Models\InsuranceExample;
use App\Models\InsuranceFaq;
use App\Models\InsuranceSearch;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SetMetaAction $action)
    {
        $insurance = Insurance::find(1);

        $insuranceErrors = InsuranceError::all();

        $insuranceAdvantages = InsuranceAdvantage::all();

        $insuranceSearches = InsuranceSearch::all();

        $insuranceExamples = InsuranceExample::all();

        $insuranceFaq = InsuranceFaq::all();

        $action->handle($insurance);

        return view('insurances.show', compact('insurance', 'insuranceFaq', 'insuranceExamples', 'insuranceErrors', 'insuranceAdvantages', 'insuranceSearches'));
    }
}
