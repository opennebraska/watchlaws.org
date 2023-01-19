<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'name',
        'state_abbr',
        'description',
        'owner_id',
        'created_by',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
