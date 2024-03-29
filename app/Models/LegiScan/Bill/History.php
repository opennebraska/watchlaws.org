<?php

namespace App\Models\LegiScan\Bill;

use App\Models\Group;
use App\Models\Group\Workspace;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\State;
use App\Traits\Models\HasLegiScanShim;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class History extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    //region Properties

    protected $fillable = [
        'composite_id',
        'bill_id',
        'history_step',
        'history_major',
        'history_body_id',
        'history_date',
        'history_action',
    ];

    protected $casts = [
        'history_date' => 'datetime:Y-m-d',
    ];

    protected $table = 'ls_bill_history';

    protected $primaryKey = 'composite_id';

    public $incrementing = false;

    public $timestamps = false;

    //endregion

    //region Relationships

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function body()
    {
        return $this->belongsTo(Body::class, 'history_body_id');
    }

    //endregion

    //region Scopes

    public function scopeWhereState(Builder $query, State $state)
    {
        return $query
            ->whereHas('bill.state', function (Builder $query) use ($state) {
                $query->where('state_abbr', $state->abbreviation);
            });
    }

    public function scopeWhereYear(Builder $query, $year)
    {
        return $query
            ->whereHas('bill.session', function (Builder $query) use ($year) {
                $query->where('year_start', $year)
                      ->orWhere('year_end', $year);
            });
    }

    public function scopeWhereIsNebraskaHearing(Builder $query)
    {
        return $query
            ->whereHas('bill.state', function ($query) {
                $query->where('state_abbr', 'NE');
            })
            ->where('history_action', 'like', '%hearing%');
    }

    public function scopePerGroup(Builder $query, Group $group)
    {
        $query->whereHas('bill.bookmarks', function($query) use($group){
            $query->whereHasMorph('scope', Workspace::class, function (Builder $query) use ($group) {
                $query->where('group_id', $group->id);
            });
        });
    }

    //endregion

    //region Attributes

    public function getStepAttribute()
    {
        return $this->history_step;
    }

    public function getMajorAttribute()
    {
        return $this->history_major;
    }

    public function getDateAttribute()
    {
        return $this->history_date;
    }

    public function getActionAttribute()
    {
        return $this->history_action;
    }

    public function getNebraskaHearingDateAttribute()
    {
        if (Str::contains($this->action, 'hearing', ignoreCase:true)) {
            $matches = [];
            if (preg_match('/(January|February|March|April|May|June|July|August|September|October|November|December)\s\d{2},\s\d{4}/', $this->action, $matches)) {
                $dateString = $matches[0];

                try {
                    return Carbon::createFromFormat('F d, Y', $dateString, 'America/Chicago')->startOfDay();
                } catch (InvalidFormatException $e) {
                    return null;
                }
            }
        }
    }

    public function getNebraskaHearingDateHumanizedAttribute()
    {
        if (is_null($this->nebraska_hearing_date)) {
            return null;
        }

        return Str::replace(
            '1 second ago',
            'Today',
            $this->nebraska_hearing_date?->diffForHumans(Carbon::now('America/Chicago')->startOfDay(), CarbonInterface::DIFF_RELATIVE_TO_NOW)
        );
    }

    public function getIsNebraskaHearingAttribute()
    {
        return stripos($this->action, 'hearing') !== false;
    }

    //endregion
}
