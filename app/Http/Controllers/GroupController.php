<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Group;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\Session;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class GroupController extends Controller
{
    public function show(Group $group)
    {
        $this->authorize('view', $group);

        return view('groups.show')->withGroup($group);
    }
}
