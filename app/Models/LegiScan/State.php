<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'ls_state';
    
    protected $primaryKey = 'state_id';

    public $timestamps = false;

    public function bills()
    {
        return $this->hasMany(Bill::class, 'state_id');
    }
}
