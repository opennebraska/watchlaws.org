<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill\History;
use App\Models\LegiScan\State;
use Illuminate\Database\Eloquent\Builder;

class HearingController extends Controller
{
    public function index(Group $group, Workspace $workspace, State $state, $year)
    {
        $historyItems = History::query()
                            ->whereState($state)
                            ->whereYear($year)
                            ->whereIsNebraskaHearing()
                            ->whereHas('bill.bookmarks', function (Builder $query) use ($workspace) {
                                $query
                                    ->perWorkspace($workspace)
                                    ->whereDirection(true);
                            })
                            ->get()
                            ->sortByDesc(function ($history) {
                                return $history->nebraska_hearing_date->timestamp ?? -PHP_INT_MAX;
                            });

        return view('groups.workspaces.states.years.hearings.index')
                    ->withGroup($group)
                    ->withWorkspace($workspace)
                    ->withState($state)
                    ->withYear($year)
                    ->withHistoryItems($historyItems);
    }
}
