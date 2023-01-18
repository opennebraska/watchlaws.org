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

    protected $guarded = [];

    protected $enumType = [
        'group',
        'workspace',
        'topic'
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // Enumerations
        $this->enumType = config('enum.group_type');
    }

    #endregion

    #region Relationships

    function parent()
    {
        return $this->belongsTo(Group::class, 'parent_id');
    }

    function children()
    {
        return $this->hasMany(Group::class, 'parent_id');
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

    #region Scopes

    function scopeRoots(Builder $query)
    {
        $query->whereNull('parent_id');
    }
    function scopeWorkspaces(Builder $query)
    {
        $query->where('type', 'workspace');
    }
    function scopeTopics(Builder $query)
    {
        $query->where('type', 'topic');
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

    function root()
    {
        // Basis case
        if (!$this->parent)
        {
            return $this;
        }

        // Recursive case
        return $this->parent->root();
    }

    function descendants()
    {
        // Basis case
        if (!$this->children)
        {
            return collect();
        }

        // Recursive case
        $result = collect();
        foreach ($this->children as $child)
        {
            $result->push($child);
            $result = $result->merge($child->descendants());
        }
        return $result;
    }

    function ancestors()
    {
        // Basis case
        if (!$this->parent)
        {
            return collect();
        }

        // Recursive case
        $result = collect([$this->parent]);
        $result = $result->merge($this->parent->ancestors());
        return $result;
    }

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
        // Root group's session
        return sprintf('group/%s/year', $this->root()->id);
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
        // Root group's session
        return sprintf('group/%s/state', $this->root()->id);
    }
    public function chosenState()
    {
        $state_abbr = session($this->chosenStateKey(), $this->root()->state_abbr);

        if ($state_abbr)
        {
            return State::where('state_abbr', $state_abbr)->first();
        }

        return null;
    }
    public function chooseState($state_abbr)
    {
        return session([$this->chosenStateKey() => $state_abbr]);
    }

    #endregion
}
