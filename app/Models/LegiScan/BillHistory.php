<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
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

    public function scopeWhereHearing(Builder $query)
    {
        return $query
            ->where(function($query){
                $query
                    ->where('history_action', 'like', '%hearing%')
                    ->whereHas('bill.state', function($query){
                        $query->where('state_abbr', 'NE');
                    })
                    ;
            })
            ->orderByDesc('history_step');
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

    #endregion
}
