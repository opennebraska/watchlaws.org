<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;

class WorkspaceController extends Controller
{
    public function index(Group $group)
    {
        return view('groups.workspaces.index')->withGroup($group);
    }

    public function show(Group $group, Workspace $workspace)
    {
        return redirect()->route('groups.workspaces.bookmarks.index', [$group, $workspace]);
    }
}
