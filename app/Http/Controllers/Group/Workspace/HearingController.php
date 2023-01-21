<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\BillHistory;
use App\Models\LegiScan\State;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Builder;

class HearingController extends Controller
{
    public function index(Group $group, Workspace $workspace, State $state, $year)
    {
        $billHistory = BillHistory::query()
                            ->whereState($state)
                            ->whereYear($year)
                            ->whereIsHearingForNebraska()
                            ->whereHas('bill.bookmarks', function(Builder $query) use($workspace){
                                $query
                                    ->perWorkspace($workspace)
                                    ->whereDirection(true);
                            })
                            ->get()
                            ->sortBy(fn($history) => $history->hearing_date->diff(now())->days)
                            ;

        return view('groups.workspaces.states.years.hearings.index')
                    ->withGroup($group)
                    ->withWorkspace($workspace)
                    ->withState($state)
                    ->withYear($year)
                    ->withBillHistory($billHistory);
    }
}
