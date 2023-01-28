<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\Group\Workspace\Topic\Section;
use Illuminate\Http\Request;

class TopicSectionController extends Controller
{
    public function index(Group $group, Workspace $workspace)
    {
        return view('groups.workspaces.topic-sections.index')
            ->withGroup($group)
            ->withWorkspace($workspace);
    }
}
