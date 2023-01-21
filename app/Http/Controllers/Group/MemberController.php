<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class MemberController extends Controller
{
    public function index(Group $group)
    {
        return view('groups.members.index')
            ->withGroup($group);
    }
}
