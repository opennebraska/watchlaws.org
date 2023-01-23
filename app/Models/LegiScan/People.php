<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'ls_people';

    protected $primaryKey = 'people_id';

    //region Relationships

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class, 'committee_sponsor_id');
    }

    //endregion
}
