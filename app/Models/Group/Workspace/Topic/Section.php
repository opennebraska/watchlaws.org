<?php

namespace App\Models\Group\Workspace\Topic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected $table = 'topic_sections';

    protected $fillable = [
        'workspace_id',
        'name',
    ];
}
