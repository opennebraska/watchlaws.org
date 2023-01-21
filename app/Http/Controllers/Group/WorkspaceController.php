<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function show(Group $group, Workspace $workspace)
    {
        return view('groups.workspaces.show')
            ->withGroup($group)
            ->withWorkspace($workspace);
    }
}
