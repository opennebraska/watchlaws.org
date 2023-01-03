<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        if ($group->state_abbr)
        {
            return redirect(route('group.state.show', [$group, $group->state_abbr]));
        }

        return view('pages.user.group.group', compact('group'));
    }
}
