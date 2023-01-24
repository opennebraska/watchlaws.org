<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'ls_progress';

    protected $primaryKey = 'progress_event_id';

    public $incrementing = false;

    public function getDescriptionAttribute()
    {
        return $this->progress_desc;
    }
}
