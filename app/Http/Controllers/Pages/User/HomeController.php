<?php

namespace App\Http\Controllers\Pages\User;

// use App\Models\LegiScan\State;
use App\Http\Controllers\Controller;
use App\Models\Group;

class HomeController extends Controller
{
    public function index()
    {
        $groups = Group::roots()->get();

        return view('pages.user.home', compact('groups'));
    }
}
