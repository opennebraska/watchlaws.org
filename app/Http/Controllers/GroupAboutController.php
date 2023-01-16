<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupAboutController extends Controller
{
    public function show(Group $group)
    {
        return view('pages.user.group.about', compact('group'));
    }
}
