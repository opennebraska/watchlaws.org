<?php

namespace App\Http\Controllers\Group;

use App\Models\Group;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index(Group $group)
    {
        return view('groups.members.index')
            ->withGroup($group);
    }
}
