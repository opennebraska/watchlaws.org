<?php

namespace App\Http\Controllers\Pages;

use App\Models\LegiScan\State;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $states             = State::nonNational()->get();
        $districtOfColumbia = State::where('abbreviation', 'DC')->first();
        $unitedStates       = State::where('abbreviation', 'US')->first();

        return view('pages.home.index')
            ->withStates($states)
            ->withDistrictOfColumbia($districtOfColumbia)
            ->withUnitedStates($unitedStates);
    }
}
