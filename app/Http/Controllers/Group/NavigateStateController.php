<?php

namespace App\Http\Controllers\Group;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigateStateController extends Controller
{
    public function update(Group $group, Request $request)
    {
        $this->authorize('view', $group);

        // TODO: Validate that state exists in the database
        $group->chooseState($request->state ?: null);

        return back();
    }
}
