<?php

namespace App\Models\Group\Workspace\Topic;

use App\Models\Group\Workspace\Topic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'topic_sections';

    protected $fillable = [
        'workspace_id',
        'name',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class, 'section_id');
    }
}
