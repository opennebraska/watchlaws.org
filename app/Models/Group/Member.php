<?php

namespace App\Models\Group;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'group_members';

    protected $guarded = [];

    //region Relationships

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //endregion

    //region Attributes

    public function getIsGroupOwnerAttribute()
    {
        if ($this->group->owner_id == $this->user->id) {
            return true;
        }

        for ($parent = $this->group->parent; $parent; $parent = $parent->parent) {
            if ($parent->group->owner_id == $this->user->id) {
                return true;
            }
        }

        return false;
    }

    //endregion
}
