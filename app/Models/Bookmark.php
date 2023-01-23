<?php

namespace App\Models;

use App\Models\Group\Workspace;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    #region Properties

    protected $fillable = [
        'scope_type',
        'scope_id',
        'bookmarkable_type',
        'bookmarkable_id',
        'reason',
        'pin_to_top',
        'direction',
        'type',
        'created_by',
    ];

    protected $casts = [
        'direction' => 'boolean',
    ];

    #endregion

    #region Relationships

    public function scope()
    {
        return $this->morphTo('scope');
    }

    public function bookmarkable()
    {
        return $this->morphTo('bookmarkable');
    }

    #endregion

    #region Scopes

    public function scopePerWorkspace(Builder $query, Workspace $workspace)
    {
        $query->whereHasMorph('scope', Workspace::class, function(Builder $query) use ($workspace){
            $query->where('id', $workspace->id);
        });
    }

    public function scopeWhereDirection(Builder $query, $direction)
    {
        return $query->where('direction', $direction);
    }

    #endregion
}
