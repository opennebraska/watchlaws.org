<?php

namespace App\Http\Controllers\Pages\User;

// use App\Models\LegiScan\State;
use App\Http\Controllers\Controller;
use App\Models\Group;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.user.home');
    }
}
