<?php

namespace App\Models;

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

    #region Scopes

    public function scopeHasMember(Builder $query, $member)
    {
        return $query
            ->whereHas('members', function(Builder $query) use($member){
                $query->where('user_id', $member->id);
            });
    }
    public function scopeHasBookmarked(Builder $query, $bookmarkable_type, $bookmarkable_id)
    {
        return $query
            ->whereHas('workspaces.topics.bookmarks', function(Builder $query) use($bookmarkable_type, $bookmarkable_id){
                $query->whereHasMorph('bookmarkable', $bookmarkable_type, function(Builder $query) use($bookmarkable_id){
                    $query->where('id', $bookmarkable_id);
                });
            });
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
                    ->whereBookmarksAreForBillsInChosenYearAndSessionForGroup($this)
                    ->orderByDesc('created_at')
                    ->get();
    }

    #endregion
}
