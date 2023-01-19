<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function show(Group $group, Workspace $workspace)
    {
        $sessionYears = Session::validYears();

        $bookmarks = Bookmark::query()
                        ->perWorkspace($workspace)
                        ->whereDirection(true)
                        ->whereBookmarksAreForBillsInChosenYearAndSessionForGroup($group)
                        ->orderByDesc('created_at')
                        ->get();

        return view('groups.workspaces.show')
            ->withGroup($group)
            ->withWorkspace($workspace)
            ->withSessionYears($sessionYears)
            ->withBookmarks($bookmarks);
    }
}
