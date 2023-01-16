<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Group $group)
    {
        // If you are a member of this group, or any parent groups
        foreach ($group->ancestors()->prepend($group) as $current)
        {
            if ($current->participants->pluck('id')->contains($user->id))
            {
                return true;
            }
        }
        return false;
    }
}
