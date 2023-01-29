<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class BookmarkController extends Controller
{
    public function index(Group $group)
    {
        return view('groups.bookmarks.index')->withGroup($group);
    }
}
