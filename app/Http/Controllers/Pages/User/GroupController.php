<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        if ($group->type == 'group')
        {
            return view('pages.user.group.group', compact('group'));
        }

        if ($group->type == 'workspace')
        {
            return view('pages.user.group.workspace', compact('group'));
        }

        if ($group->type == 'topic')
        {
            // if (!request('choose-state') && $group->default_state)
            // {
            //     return redirect(route('group.state.show', [$group, $group->default_state->abbreviation]));
            // }
            return view('pages.user.group.topic', compact('group'));
        }
    }
}
