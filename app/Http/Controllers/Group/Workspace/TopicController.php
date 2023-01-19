<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\Topic;
use App\Models\Workspace;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class TopicController extends Controller
{
    public function show(Group $group, Workspace $workspace, Topic $topic)
    {
        $sessionYears = Session::validYears();

        $bookmarks = Bookmark::query()
                        ->perTopic($topic)
                        ->whereDirection(true)
                        ->whereBookmarksAreForBillsInChosenYearAndSessionForGroup($group)
                        ->orderByDesc('created_at')
                        ->get();

        return view('groups.workspaces.topics.show')
            ->withGroup($group)
            ->withWorkspace($workspace)
            ->withTopic($topic)
            ->withSessionYears($sessionYears)
            ->withBookmarks($bookmarks);
    }
}
