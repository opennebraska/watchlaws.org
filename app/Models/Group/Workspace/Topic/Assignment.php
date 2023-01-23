<?php

namespace App\Models\Group\Workspace\Topic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'topic_assignments';

    protected $fillable = [
        'topic_id',
        'topicable_type',
        'topicable_id',
    ];

    public function topicable()
    {
        return $this->morphTo('topicable');
    }
}
