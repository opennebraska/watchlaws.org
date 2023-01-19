<?php

namespace App\Models;

use App\Models\LegiScan\State;
use App\Traits\Models\HasEnumProperties;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use HasEnumProperties;

    #region Properties

    protected $fillable = [
        'name',
        'type',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    #endregion

    #region Relationships

    function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }

    function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'scope');
    }

    function state()
    {
        return $this->belongsTo(State::class, 'state_abbr', 'state_abbr');
    }

    function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    function members()
    {
        return $this->hasMany(GroupMember::class);
    }

    #endregion

    #region Attributes

    function getDefaultStateAttribute()
    {
        if ($this->state) {
            return $this->state;
        }

        for ($parent = $this->parent; $parent; $parent = $parent->parent)
        {
            if ($parent->state) {
                return $parent->state;
            }
        }
    }

    function getParticipantsAttribute()
    {
        return $this->members->pluck('user')->prepend($this->owner)->unique();
    }

    #endregion

    #region Methods

    function getRole(User $user)
    {
        if ($this->owner_id == $user->id)
        {
            return 'owner';
        }

        return $this->members()->where('user_id', $user->id)->first()->role;
    }

    public function chosenYearKey()
    {
        return sprintf('group/%s/year', $this->id);
    }
    public function chosenYear()
    {
        return session($this->chosenYearKey(), Carbon::now()->year);
    }
    public function chooseYear($year)
    {
        return session([$this->chosenYearKey() => $year]);
    }

    public function chosenStateKey()
    {
        return sprintf('group/%s/state', $this->id);
    }
    public function chosenState()
    {
        $state_abbr = session($this->chosenStateKey(), $this->state_abbr);
        return $state_abbr
             ? State::where('state_abbr', $state_abbr)->first()
             : null;
    }
    public function chooseState($state_abbr)
    {
        return session([$this->chosenStateKey() => $state_abbr]);
    }

    #endregion
}
