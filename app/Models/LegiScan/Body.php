<?php

namespace App\Models\LegiScan;

use App\Traits\Models\HasLegiScanShim;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Body extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    //region Properties

    protected $table = 'ls_body';

    protected $primaryKey = 'body_id';

    public $incrementing = false;

    public $timestamps = false;

    //endregion

    //region Scopes

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    //endregion

    //region Attributes

    public function getAbbreviationAttribute()
    {
        return $this->body_abbr;
    }

    public function getShortNameAttribute()
    {
        return $this->body_short;
    }

    public function getNameAttribute()
    {
        return $this->body_name;
    }

    public function getRoleAbbreviationAttribute()
    {
        return $this->body_role_abbr;
    }

    public function getRoleNameAttribute()
    {
        return $this->body_role_name;
    }

    //endregion
}
