<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillHistory extends Model
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
    public function scopeWhereIsHearingForNebraska(Builder $query)
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
    public function getHearingDateAttribute()
    {
        $dateString = str_replace('Notice of hearing for ', '', $this->action);

        return Carbon::createFromFormat('F j, Y', $dateString);
    }
    public function getHearingDateHumanizedAttribute()
    {
        return $this->hearing_date->diffForHumans(Carbon::now('utc'), CarbonInterface::DIFF_RELATIVE_TO_NOW) ?? null;
    }
    public function getIsHearingForNebraskaAttribute()
    {
        return strpos('hearing', $this->action);
    }

    #endregion
}
