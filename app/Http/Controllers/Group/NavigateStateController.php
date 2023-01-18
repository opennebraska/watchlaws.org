<?php

namespace App\Http\Controllers\Grouop;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

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
