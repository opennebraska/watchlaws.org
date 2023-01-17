<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Group;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        $this->authorize('view', $group);

        // Assuming session is no more than 2 years (e.g. no sessions between start and end years)
        $session_years = Session::query()
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ->get()
            ->pluck('year')
            ->filter(function ($year) { return $year <= Carbon::now()->year; });

        // $session_years = Session::query()
        //     ->selectYears()
        //     ->get()
        //     ->pluck('year')
        //     ->filter(function ($year) { return $year <= Carbon::now()->year; });

        $bookmarks = Bookmark::query()
            ->where('scope_type', Group::class)
            ->whereIn('scope_id', $group->descendants()->pluck('id')->prepend($group->id))
            ->where('direction', true)
            ->whereBills()
            ->whereHas('bookmarkable.session', function(Builder $query) use ($group){
                return $query->where('year_start', $group->chosenYear())
                           ->orWhere('year_end', $group->chosenYear());
            })
            ->when($group->chosenState(), function(Builder $query, $state) {
                $query->whereHas('bookmarkable.state', function(Builder $query) use ($state) {
                    return $query->where('state_abbr', $state->abbreviation);
                });
            })
            ->orderByDesc('created_at')
            ->get();

        if ($group->type == 'group')
        {
            return view('pages.user.group.group', compact('group', 'session_years', 'bookmarks'));
        }

        if ($group->type == 'workspace')
        {
            return view('pages.user.group.workspace', compact('group', 'session_years', 'bookmarks'));
        }

        if ($group->type == 'topic')
        {
            return view('pages.user.group.topic', compact('group', 'session_years', 'bookmarks'));
        }
    }
}
