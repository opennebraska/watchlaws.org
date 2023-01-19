<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Session;
use Carbon\Carbon;

class HearingController extends Controller
{
    public function index(Group $group)
    {
        // Assuming session is no more than 2 years (e.g. no sessions between start and end years)
        $session_years = Session::query()
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ->get()
            ->pluck('year')
            ->filter(function ($year) { return $year <= Carbon::now()->year; });

        return view('groups.hearings.index', compact('group', 'session_years'));
    }
}
