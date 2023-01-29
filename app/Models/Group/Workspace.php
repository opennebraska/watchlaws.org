<?php

namespace App\Models\Group;

use App\Models\Bookmark;
use App\Models\Group;
use App\Models\Group\Workspace\Topic;
use App\Models\Group\Workspace\Topic\Section;
use App\Models\LegiScan\Bill;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    //region Properties

    protected $fillable = [
        'group_id',
        'name',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    //endregion

    //region Relationships

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function topicSections()
    {
        return $this->hasMany(Section::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'scope');
    }

    //endregion

    //region Scopes

    public function scopeWhereGroup(Builder $query, Group $group)
    {
        $query->where('group_id', $group->id);
    }

    //endregion

    //region Public methods

    public function findBookmarks()
    {
        return Bookmark::query()
            ->perWorkspace($this)
            ->whereDirection(true)
            ->whereHasMorph('bookmarkable', Bill::class, function ($query) {
                $query
                    ->when($this->group->chosenState(), function ($query, $state) {
                        $query->whereState($state);
                    })
                    ->when($this->group->chosenYear(), function ($query, $year) {
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
