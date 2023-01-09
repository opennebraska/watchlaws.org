<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\LegiScan\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class GroupSessionController extends Controller
{
    public function show(Group $group, State $state, Session $session)
    {
        $bookmarks = Bookmark::query()
            ->where('scope_type', Group::class)
            ->whereIn('scope_id', $group->descendants()->pluck('id')->prepend($group->id))
            ->bills()
            ->whereHas('bookmarkable.session', function(Builder $query) use ($session) {
                return $query->where('session_id', $session->id);
            })
            ->get();

        return view('pages.user.group.session', compact('group', 'state', 'session', 'bookmarks'));
    }
}
