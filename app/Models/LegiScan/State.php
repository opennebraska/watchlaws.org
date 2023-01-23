<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    protected $table = 'ls_state';

    protected $primaryKey = 'state_id';

    public $timestamps = false;

    //region Overrides

    public function getRouteKeyName()
    {
        return 'state_abbr';
    }

    //endregion

    //region Relationships

    public function bills()
    {
        return $this->hasMany(Bill::class, 'state_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'state_id');
    }

    //endregion

    //region Attributes

    public function getAbbreviationAttribute()
    {
        return $this->state_abbr;
    }

    public function getNameAttribute()
    {
        return $this->state_name;
    }

    //endregion
}
