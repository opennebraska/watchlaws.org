<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventType extends Model
{
    use HasFactory;

    protected $table = 'ls_event_type';

    protected $primaryKey = 'event_type_id';
}
