<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;

class BookmarkController extends Controller
{
    public function index(Group $group, Workspace $workspace)
    {
        return view('groups.workspaces.bookmarks.index')
            ->withGroup($group)
            ->withWorkspace($workspace);
    }
}
