<?php

namespace App\Models;

use App\Traits\Models\HasEnumProperties;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use HasEnumProperties;

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
}
