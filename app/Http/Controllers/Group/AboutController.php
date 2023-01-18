<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show(Group $group)
    {
        return view('groups.about', compact('group'));
    }
}
