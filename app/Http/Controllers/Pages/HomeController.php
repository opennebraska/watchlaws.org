<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\LegiScan\State;

class HomeController extends Controller
{
    public function index()
    {
        $states = State::whereNotIn('state_abbr', ['DC', 'US'])->get();

        $dc = State::where('state_abbr', 'DC')->first();
        $us = State::where('state_abbr', 'US')->first();

        return view('pages.home.index', compact('states', 'dc', 'us'));
    }
}
