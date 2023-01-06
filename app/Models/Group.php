<?php

namespace App\Models;

use App\Models\LegiScan\State;
use App\Traits\Models\HasEnumProperties;
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

    #endregion

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        // Enumerations
        $this->enumType = config('enum.group_type');
    }

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

    #endregion
}
