<?php

namespace App\Http\Controllers\Group\Workspace\Topic;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\Topic;
use App\Models\Workspace;
use Carbon\Carbon;

class BillSearchController extends Controller
{
    public function show(Group $group, Workspace $workspace, Topic $topic)
    {
        $sessionYears = Session::validYears();

        return view('groups.workspaces.topics.bill-search')
            ->withGroup($group)
            ->withWorkspace($workspace)
            ->withTopic($topic)
            ->withSessionYears($sessionYears);
    }
}
