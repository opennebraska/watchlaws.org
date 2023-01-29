<?php

namespace App\Models;

use App\Models\Group\Member;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
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

    //region Properties

    protected $fillable = [
        'name',
        'type',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    //endregion

    //region Relationships

    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_abbr', 'state_abbr');
    }

    public function memberships()
    {
        return $this->hasMany(Member::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'group_members');
    }

    //endregion

    //region Scopes

    public function scopeHasMember(Builder $query, $user)
    {
        return $query
            ->whereHas('members', function (Builder $query) use ($user) {
                $query->where('users.id', $user->id);
            });
    }

    public function scopeHasBookmarked(Builder $query, $bookmarkable)
    {
        return $query->whereHas('workspaces.bookmarks', function (Builder $query) use ($bookmarkable) {
            $query->whereHasMorph('bookmarkable', get_class($bookmarkable), function (Builder $query) use ($bookmarkable) {
                $query->where(
                    $bookmarkable->getTable() . '.' . $bookmarkable->getKeyName(),
                    $bookmarkable->id
                );
            });
        });
    }

    //endregion

    //region Methods

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
        $stateAbbr = session($this->chosenStateKey(), $this->state_abbr);

        return $stateAbbr
             ? State::where('state_abbr', $stateAbbr)->first()
             : null;
    }

    public function chooseState($stateAbbr)
    {
        return session([$this->chosenStateKey() => $stateAbbr]);
    }

    public function findBookmarks()
    {
        return Bookmark::query()
            ->perGroup($this)
            ->whereDirection(true)
            ->whereHasMorph('bookmarkable', Bill::class, function ($query) {
                $query
                    ->when($this->chosenState(), function ($query, $state) {
                        $query->whereState($state);
                    })
                    ->when($this->chosenYear(), function ($query, $year) {
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
