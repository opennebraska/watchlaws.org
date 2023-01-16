<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    #region Relationships

    function group()
    {
        return $this->belongsTo(Group::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }

    #endregion

    #region Attributes

    public function getIsGroupOwnerAttribute()
    {
        if ($this->group->owner_id == $this->user->id) {
            return true;
        }

        for ($parent = $this->group->parent; $parent; $parent = $parent->parent)
        {
            if ($parent->group->owner_id == $this->user->id) {
                return true;
            }
        }

        return false;
    }

    #endregion
}
