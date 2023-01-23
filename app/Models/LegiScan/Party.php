<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $table = 'ls_party';

    protected $primaryKey = 'party_id';

    public function getAbbreviationAttribute()
    {
        return $this->party_abbr;
    }

    public function getShortNameAttribute()
    {
        return $this->party_short;
    }

    public function getNameAttribute()
    {
        return $this->party_name;
    }
}
