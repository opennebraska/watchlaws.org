<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        return redirect()->route('groups.workspaces.index', [$group]);
    }
}
