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

        $page_query_year = request()->query('year', $session_years->first());

        $bookmarks = Bookmark::query()
            ->where('scope_type', Group::class)
            ->whereIn('scope_id', $group->descendants()->pluck('id')->prepend($group->id))
            ->bills()
            ->whereHas('bookmarkable.session', function(Builder $query) use ($page_query_year){
                return $query->where('year_start', $page_query_year)
                                ->orWhere('year_end', $page_query_year);
            })
            ->get();

        if ($group->type == 'group')
        {
            return view('pages.user.group.group', compact('group', 'session_years', 'page_query_year', 'bookmarks'));
        }

        if ($group->type == 'workspace')
        {
            return view('pages.user.group.workspace', compact('group', 'session_years', 'page_query_year', 'bookmarks'));
        }

        if ($group->type == 'topic')
        {
            return view('pages.user.group.topic', compact('group', 'session_years', 'page_query_year', 'bookmarks'));
        }
    }
}
