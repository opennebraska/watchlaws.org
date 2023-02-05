<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Bill\History;
use Illuminate\Database\Eloquent\Builder;

class HearingController extends Controller
{
    public function index(Group $group)
    {
        $historyItems = History::query()
            ->perGroup($group)
            ->when($group->chosenState(), function (Builder $query) use ($group) {
                $query->whereState($group->chosenState());
            })
            ->whereYear($group->chosenYear())
            ->whereIsNebraskaHearing()
            ->whereHas('bill.bookmarks', function (Builder $query) {
                $query->whereDirection(true);
            })
            ->get()
            ->sortByDesc(function ($history) {
                return $history->nebraska_hearing_date->timestamp ?? -PHP_INT_MAX;
            });

        return view('groups.hearings.index')
            ->withGroup($group)
            ->withHistoryItems($historyItems);
    }
}
