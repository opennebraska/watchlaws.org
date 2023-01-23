<?php

namespace App\Http\Controllers\Group\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\Group\Workspace\Topic;

class TopicController extends Controller
{
    public function show(Group $group, Workspace $workspace, Topic $topic)
    {
        return view('groups.workspaces.topics.show')
            ->withGroup($group)
            ->withWorkspace($workspace)
            ->withTopic($topic);
    }
}
