<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class AboutController extends Controller
{
    public function show(Group $group)
    {
        return view('groups.about.show', compact('group'));
    }
}
