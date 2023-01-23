<?php

namespace App\Models\Group\Workspace;

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\Group\Workspace\Topic\Section;
use App\Models\LegiScan\Bill;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    #region Properties

    protected $fillable = [
        'workspace_id',
        'name',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    #endregion

    #region Relationships

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    #endregion

    #region Scopes

    public function scopePerWorkspace(Builder $query, Workspace $workspace)
    {
        return $query->where('workspace_id', $workspace->id);
    }
    public function scopePerGroup(Builder $query, Group $group)
    {
        return $query->whereHas('workspace.group', function(Builder $query) use($group){
            $query->where('id', $group->id);
        });
    }

    #endregion

    #region Public methods

    public function findBookmarks()
    {
        return Bookmark::query()

                    // For bills
                    ->whereHasMorph('bookmarkable', Bill::class, function(Builder $query) {

                        // For this topic
                        $query->whereTopic($this)

                        // Optionally filtered by state
                        ->when($this->workspace->group->chosenState(), function($query, $state) {
                            $query->whereState($state);
                        })

                        // Optionally filtered by year
                        ->when($this->workspace->group->chosenYear(), function($query, $year) {
                            $query->whereYear($year);
                        });

                    })
                    ->whereDirection(true)
                    ->orderByDesc('created_at')
                    ->get();
    }

    #endregion
}
