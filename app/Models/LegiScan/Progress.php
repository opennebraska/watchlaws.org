<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'ls_progress';

    protected $primaryKey = 'progress_event_id';

    public function getDescriptionAttribute()
    {
        return $this->progress_desc;
    }
}
