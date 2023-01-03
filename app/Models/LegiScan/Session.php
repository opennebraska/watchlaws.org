<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
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

    #region Attributes

    public function getShortDescriptionAttribute()
    {
        // Format: Name (Year[-ToYear])[ - Non-regular]

        $result = '';
        $result .= $this->name;
        $result .= ' ('.implode('-', array_unique([$this->year_start, $this->year_end])).')';
        $result .= $this->tagline == 'Regular Session' ? '' : ' - '.$this->tagline;

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
}
