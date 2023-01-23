<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        return view('groups.show')->withGroup($group);
    }
}
