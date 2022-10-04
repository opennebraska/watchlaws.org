<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\State;
use App\Http\Controllers\Controller;

class StateHomeController extends Controller
{
    public function index(State $state)
    {
        return view('pages.state.home.index', compact('state'));
    }
}
