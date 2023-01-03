<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\LegiScan\Session;
use App\Models\LegiScan\State;
use Illuminate\Http\Request;

class GroupBillSearchController extends Controller
{
    public function show(Group $group, $state_abbr, Session $session)
    {
        $state = State::where('state_abbr', $state_abbr)->first();

        if ($group->type == 'topic')
        {
            return view('pages.user.group.bill-search', compact('group', 'state', 'session'));
        }
    }
}
