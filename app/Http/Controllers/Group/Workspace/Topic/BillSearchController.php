<?php

namespace App\Http\Controllers\Group\Workspace\Topic;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillSearchController extends Controller
{
    public function show(Group $group, Group $workspace, Group $topic)
    {
        $session_years = Session::query()
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ->get()
            ->pluck('year')
            ->filter(function ($year) { return $year <= Carbon::now()->year; });

        return view('groups.workspaces.topics.bill-search', compact('group', 'workspace', 'topic', 'session_years'));
    }
}
