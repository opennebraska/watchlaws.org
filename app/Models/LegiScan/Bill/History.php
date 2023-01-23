<?php

namespace App\Models\LegiScan\Bill;

use App\Models\LegiScan\Bill;
use App\Models\LegiScan\State;
use App\Traits\Models\HasLegiScanShim;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class History extends Model
{
    use HasFactory;
    use HasLegiScanShim;

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

    #region Properties

    protected $table = 'ls_bill_history';

    protected $primaryKey = 'composite_id';

    #endregion

    #region Relationships

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function body()
    {
        return $this->belongsTo(Body::class, 'history_body_id');
    }

    #endregion

    #region Scopes

    public function scopeWhereState(Builder $query, State $state)
    {
        return $query
            ->whereHas('bill.state', function(Builder $query) use($state){
                $query->where('state_abbr', $state->abbreviation);
            });
    }
    public function scopeWhereYear(Builder $query, $year)
    {
        return $query
            ->whereHas('bill.session', function(Builder $query) use($year){
                $query->where('year_start', $year)
                      ->orWhere('year_end', $year);
            });
    }
    public function scopeWhereIsNebraskaHearing(Builder $query)
    {
        return $query
            ->whereHas('bill.state', function($query){
                $query->where('state_abbr', 'NE');
            })
            ->where('history_action', 'like', '%hearing%');
    }

    #endregion

    #region Attributes

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
        if (Str::contains($this->action, 'hearing', ignoreCase:true))
        {
            $matches = [];
            if (preg_match('/(January|February|March|April|May|June|July|August|September|October|November|December)\s\d{2},\s\d{4}/', $this->action, $matches))
            {
                $dateString = $matches[0];

                try
                {
                    return Carbon::createFromFormat('F d, Y', $dateString);
                }
                catch (InvalidFormatException $e)
                {
                    return null;
                }
            }
        }
    }
    public function getNebraskaHearingDateHumanizedAttribute()
    {
        return $this->nebraska_hearing_date
             ? $this->nebraska_hearing_date->diffForHumans(Carbon::now('utc'), CarbonInterface::DIFF_RELATIVE_TO_NOW)
             : null;
    }
    public function getIsNebraskaHearingAttribute()
    {
        return strpos('hearing', $this->action);
    }

    #endregion
}
