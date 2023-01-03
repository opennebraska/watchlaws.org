<?php

namespace App\Models;

use App\Models\LegiScan\Bill;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    #region Properties

    protected $guarded = [];

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
        return $this->morphTo();
    }

    #endregion

    #region Scopes

    public function scopeBills(Builder $query)
    {
        return $query->where('bookmarkable_type', Bill::class);
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
