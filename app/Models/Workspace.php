<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'name',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
