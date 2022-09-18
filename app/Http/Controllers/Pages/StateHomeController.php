<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\State;
use Illuminate\Http\Request;

class StateHomeController extends Controller
{
    public function index(State $state)
    {
        return view('pages.state.home.index', compact('state'));
    }
}
