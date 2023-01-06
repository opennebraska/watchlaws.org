<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\State;
use Illuminate\Http\Request;

class GroupStateController extends Controller
{
    public function index(Group $group)
    {
        return view('pages.user.group.state.index', compact('group'));
    }

    public function show(Group $group, $state_abbr)
    {
        $state = State::where('state_abbr', $state_abbr)->first();

        return view('pages.user.group.state.show', compact('group', 'state'));
    }
}
