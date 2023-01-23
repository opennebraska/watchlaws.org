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

    function memberships()
    {
        return $this->hasMany(Member::class);
    }

    function members()
    {
        return $this->hasManyThrough(User::class, Member::class, 'group_id', 'id', 'id', 'user_id');
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
                    ->whereHasMorph('scope', Workspace::class, function(Builder $query) {

                        $query->where('group_id', $this->id);

                    })
                    ->whereHasMorph('bookmarkable', Bill::class, function($query) {

                        $query->when($this->chosenState(), function($query, $state) {
                            $query->whereState($state);
                        })

                        ->when($this->chosenYear(), function($query, $year) {
                            $query->whereYear($year);
                        });

                    })
                    ->whereDirection(true)
                    ->orderByDesc('created_at')
                    ->get();

    }

    #endregion
}
