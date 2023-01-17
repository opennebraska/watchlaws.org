<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupNavigateStateController extends Controller
{
    public function update(Group $group, Request $request)
    {
        $this->authorize('view', $group);

        // TODO: Validate that state exists in the database
        $group->chooseState($request->state ?: null);

        return back();
    }
}
