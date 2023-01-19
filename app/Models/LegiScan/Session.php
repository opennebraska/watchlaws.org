<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    protected $table = 'ls_session';
    protected $primaryKey = 'session_id';

    public $timestamps = false;

    #region Relationships

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'session_id');
    }

    #endregion

    #region Scopes

    public function scopeSelectYears(Builder $query)
    {
        return $query
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ;
    }

    #endregion

    #region Attributes

    public function getShortDescriptionAttribute()
    {
        // Format: Name (Year[-ToYear])

        $result = '';
        $result .= $this->name;
        $result .= ' ('.implode('-', array_unique([$this->year_start, $this->year_end])).')';

        return $result;
    }
    public function getNameAttribute()
    {
        return $this->session_name;
    }
    public function getTitleAttribute()
    {
        return $this->session_title;
    }
    public function getTaglineAttribute()
    {
        return $this->session_tag;
    }

    #endregion

    #region Static methods

    public static function validYears()
    {
        // Assuming session is no more than 2 years (e.g. no third session between start and end years)

        return Session::query()
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ->get()
            ->pluck('year')
            ->filter(function ($year) { return $year <= Carbon::now()->year; });
    }

    #endregion
}
