<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill\History;
use Illuminate\Database\Eloquent\Builder;

class HearingController extends Controller
{
    public function index(Group $group, Workspace $workspace)
    {
        $historyItems = History::query()
            ->when($group->chosenState(), function (Builder $query) use ($group) {
                $query->whereState($group->chosenState());
            })
            ->whereYear($group->chosenYear())
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

        return view('groups.workspaces.hearings.index')
            ->withGroup($group)
            ->withWorkspace($workspace)
            ->withHistoryItems($historyItems);
    }
}
