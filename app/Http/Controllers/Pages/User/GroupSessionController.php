<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\LegiScan\State;
use Illuminate\Http\Request;

class GroupSessionController extends Controller
{
    public function show(Group $group, $state_abbr, Session $session)
    {
        $state = State::where('state_abbr', $state_abbr)->first();

        return view('pages.user.group.session', compact('group', 'state', 'session'));
    }
}
