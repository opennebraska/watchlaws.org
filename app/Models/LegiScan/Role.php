<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //region Properties

    protected $table = 'ls_role';

    protected $primaryKey = 'role_id';

    public $incrementing = false;

    //endregion

    //region Attributes

    public function getNameAttribute()
    {
        return $this->role_name;
    }

    public function getAbbreviationAttribute()
    {
        return $this->role_abbreviation;
    }

    //endregion
}
