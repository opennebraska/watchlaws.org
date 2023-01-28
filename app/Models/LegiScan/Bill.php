<?php

namespace App\Models\LegiScan;

use App\Models\Bookmark;
use App\Models\Group\Workspace\Topic;
use App\Models\Group\Workspace\Topic\Assignment;
use App\Models\LegiScan\Bill\Amendment;
use App\Models\LegiScan\Bill\Calendar;
use App\Models\LegiScan\Bill\History;
use App\Models\LegiScan\Bill\Progress;
use App\Models\LegiScan\Bill\Reason;
use App\Models\LegiScan\Bill\Referral;
use App\Models\LegiScan\Bill\Sast;
use App\Models\LegiScan\Bill\Sponsor;
use App\Models\LegiScan\Bill\Subject;
use App\Models\LegiScan\Bill\Supplement;
use App\Models\LegiScan\Bill\Text;
use App\Models\LegiScan\Bill\Vote;
use App\Traits\Models\HasLegiScanShim;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    //region Properties

    protected $table = 'ls_bill';

    protected $primaryKey = 'bill_id';

    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    protected $fillable = [
        'bill_id',
        'bill_number',
        'bill_number',
        'status_date',
        'title',
        'description',
        'legiscan_url',
        'state_url',
        'change_hash',
        'state_id',
        'session_id',
        'body_id',
        'current_body_id',
        'bill_type_id',
        'status_id',
        'pending_committee_id',
    ];

    //endregion

    //region Relationships

    // belongsTo()

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function body()
    {
        return $this->belongsTo(Body::class, 'body_id');
    }

    public function currentBody()
    {
        return $this->belongsTo(Body::class, 'current_body_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'bill_type_id');
    }

    public function status()
    {
        return $this->belongsTo(Progress::class, 'status_id');
    }

    public function pendingCommittee()
    {
        return $this->belongsTo(Committee::class, 'pending_committee_id');
    }

    // hasMany()

    public function ammendments()
    {
        return $this->hasMany(Amendment::class, 'bill_id');
    }

    public function calendarDates()
    {
        return $this->hasMany(Calendar::class, 'bill_id');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'bill_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class, 'bill_id');
    }

    public function reasons()
    {
        return $this->hasMany(Reason::class, 'bill_id');
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'bill_id');
    }

    public function sastItems()
    {
        return $this->hasMany(Sast::class, 'bill_id');
    }

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class, 'bill_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'bill_id');
    }

    public function supplements()
    {
        return $this->hasMany(Supplement::class, 'bill_id');
    }

    public function texts()
    {
        return $this->hasMany(Text::class, 'bill_text');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'bill_id');
    }

    // morphMany()

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    // morphToMany()

    public function topics()
    {
        return $this->morphToMany(Topic::class, 'topicable', 'topic_assignments');
    }

    public function topicAssignments()
    {
        return $this->morphMany(Assignment::class, 'topicable');
    }

    //endregion

    //region Scopes

    public function scopeWhereYear(Builder $query, $year)
    {
        $query->whereHas('session', function (Builder $query) use ($year) {
            return $query->where('year_start', $year)
                ->orWhere('year_end', $year);
        });
    }

    public function scopeWhereState(Builder $query, $state)
    {
        $query->whereHas('state', function (Builder $query) use ($state) {
            $query->where('state_abbr', $state->abbreviation);
        });
    }

    public function scopeWhereTopic(Builder $query, Topic $topic)
    {
        // bill -> topic
        $query->whereHas('topicAssignments', function (Builder $query) use ($topic) {
            $query->where('topic_id', $topic->id);
        });
    }

    //endregion

    //region Attributes

    public function getNumberAttribute()
    {
        return $this->bill_number;
    }

    //endregion
}
