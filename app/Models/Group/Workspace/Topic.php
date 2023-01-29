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

    //region Properties

    protected $fillable = [
        'workspace_id',
        'name',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    //endregion

    //region Relationships

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    //endregion

    //region Scopes

    public function scopePerWorkspace(Builder $query, Workspace $workspace)
    {
        return $query->where('workspace_id', $workspace->id);
    }

    public function scopePerGroup(Builder $query, Group $group)
    {
        return $query->whereHas('workspace.group', function (Builder $query) use ($group) {
            $query->where('id', $group->id);
        });
    }

    //endregion

    //region Public methods

    public function findBookmarks()
    {
        return Bookmark::query()
            ->whereDirection(true)
            ->whereHasMorph('bookmarkable', Bill::class, function (Builder $query) {
                $query
                    ->whereTopic($this)
                    ->when($this->workspace->group->chosenState(), function ($query, $state) {
                        $query->whereState($state);
                    })
                    ->when($this->workspace->group->chosenYear(), function ($query, $year) {
                        $query->whereYear($year);
                    });
            })
            ->with('bookmarkable.history')
            ->get()
            ->sortBy([

                fn ($bookmarkA, $bookmarkB) => ($bookmarkB->bookmarkable->history->sortByDesc('history_step')->first()->history_date->timestamp ?? -PHP_INT_MAX)
                                           <=> ($bookmarkA->bookmarkable->history->sortByDesc('history_step')->first()->history_date->timestamp ?? -PHP_INT_MAX),

                fn ($bookmarkA, $bookmarkB) => ($bookmarkB->bookmarkable->history()->where('history_action', 'like', 'Notice of hearing for %')->get()->sortByDesc('history_step')->first()->history_date->timestamp ?? -PHP_INT_MAX)
                                           <=> ($bookmarkA->bookmarkable->history()->where('history_action', 'like', 'Notice of hearing for %')->get()->sortByDesc('history_step')->first()->history_date->timestamp ?? -PHP_INT_MAX),

                ['created_at', 'desc'],

            ]);
    }

    //endregion
}
