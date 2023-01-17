<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\LegiScan\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupBillSearchController extends Controller
{
    public function show(Group $group, State $state, Session $session)
    {
        $session_years = Session::query()
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ->get()
            ->pluck('year')
            ->filter(function ($year) { return $year <= Carbon::now()->year; });

        return view('pages.user.group.topic-bill-search', compact('group', 'session_years'));
    }
}
