<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupNavigateYearController extends Controller
{
    public function update(Group $group, Request $request)
    {
        $this->authorize('view', $group);

        // TODO: Validate year is for a session that exists in the database
        $group->chooseYear($request->year);

        return back();
    }
}
