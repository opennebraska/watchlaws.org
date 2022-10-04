<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Body extends Model
{
    use HasFactory;

    protected $table = 'ls_body';

    protected $primaryKey = 'body_id';

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
