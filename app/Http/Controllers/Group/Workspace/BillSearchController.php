<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\Group\Workspace\Topic;

class BillSearchController extends Controller
{
    public function show(Group $group, Workspace $workspace, Topic $topic)
    {
        return view('groups.workspaces.bill-search')
            ->withGroup($group)
            ->withWorkspace($workspace);
    }
}
