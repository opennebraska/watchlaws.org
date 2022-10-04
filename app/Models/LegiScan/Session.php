<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory;

    protected $table = 'ls_session';

    protected $primaryKey = 'session_id';

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
