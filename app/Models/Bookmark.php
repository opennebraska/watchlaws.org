<?php

namespace App\Models;

use App\Models\LegiScan\Bill;
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

    public function scopePerGroup(Builder $query, Group $group)
    {
        $query->whereHasMorph('scope', Topic::class, function(Builder $query) use ($group){
            $query->whereHas('workspace.group', function(Builder $query) use($group){
                $query->where('id', $group->id);
            });
        });
    }
    public function scopePerWorkspace(Builder $query, Workspace $workspace)
    {
        $query->whereHasMorph('scope', Topic::class, function(Builder $query) use ($workspace){
            $query->whereHas('workspace', function(Builder $query) use($workspace){
                $query->where('id', $workspace->id);
            });
        });
    }
    public function scopePerTopic(Builder $query, Topic $topic)
    {
        $query->whereHasMorph('scope', Topic::class, function(Builder $query) use ($topic){
            $query->where('id', $topic->id);
        });
    }
    public function scopeWhereDirection(Builder $query, $direction)
    {
        return $query->where('direction', $direction);
    }
    public function scopeWhereBookmarksAreForBillsInChosenYearAndSessionForGroup(Builder $query, Group $group)
    {
        // Filter for bills
        $query->whereHasMorph('bookmarkable', Bill::class, function(Builder $query) use ($group) {

            // Filter by chosen bill.state
            $query->when($group->chosenState(), function(Builder $query, $state) {
                $query->whereHas('state', function(Builder $query) use ($state) {
                    $query->where('state_abbr', $state->abbreviation);
                });
            })

            // Filter by chosen bill.session
            ->when($group->chosenYear(), function(Builder $query, $year) {
                $query->whereHas('session', function(Builder $query) use ($year) {
                    return $query->where('year_start', $year)
                                 ->orWhere('year_end', $year);
                });
            });

        });
    }

    #endregion

    #region Methods

    public static function getForBill($bookmarkable, $scope)
    {
        return Bookmark::query()
            ->where([
                ['scope_type', get_class($scope)],
                ['scope_id', $scope->id],
                ['bookmarkable_type', get_class($bookmarkable)],
                ['bookmarkable_id', $bookmarkable->id]
            ])
            ->first();
    }

    public static function clear($bookmarkable, $scope)
    {
        // Remove bookmark for bill and scope
        Bookmark::getForBill($bookmarkable, $scope)->delete();
    }

    public static function up($bookmarkable, $scope)
    {
        // Add bookmark "up" for bill and scope
        Bookmark::create([
            'scope_type' => get_class($scope),
            'scope_id' => $scope->id,
            'bookmarkable_type' => get_class($bookmarkable),
            'bookmarkable_id' => $bookmarkable->id,
            'direction' => true,
            'created_by' => auth()->user()->id,
        ]);
    }

    public static function down($bookmarkable, $scope)
    {
        // Add bookmark "down" for bill and scope
        Bookmark::create([
            'scope_type' => get_class($scope),
            'scope_id' => $scope->id,
            'bookmarkable_type' => get_class($bookmarkable),
            'bookmarkable_id' => $bookmarkable->id,
            'direction' => false,
            'created_by' => auth()->user()->id,
        ]);
    }

    #endregion
}
