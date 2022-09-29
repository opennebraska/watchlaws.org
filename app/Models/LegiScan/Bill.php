<?php

namespace App\Models\LegiScan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;

    #region Variables

    protected $table = 'ls_bill';

    protected $primaryKey = 'bill_id';

    public $timestamps = false;

    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    protected $fillable = [
        'bill_id',
        'state_id',
        'session_id',
        'body_id',
        'current_body_id',
        'bill_type_id',
        'bill_number',
        'status_id',
        'bill_number',
        'status_date',
        'title',
        'description',
        'pending_committee_id',
        'legiscan_url',
        'state_url',
        'change_hash',
    ];

    #endregion

    #region Relationships

    // Foreign key references
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
    public function current_body()
    {
        return $this->belongsTo(Body::class, 'current_body_id');
    }
    public function bill_type()
    {
        return $this->belongsTo(Type::class, 'bill_type_id');
    }
    public function status()
    {
        return $this->belongsTo(Progress::class, 'status_id');
    }
    public function pending_committee()
    {
        return $this->belongsTo(Committee::class, 'pending_committee_id');
    }

    // One-to-many references
    public function ammendments()
    {
        return $this->hasMany(BillAmendment::class, 'bill_id');
    }
    public function calendar_dates()
    {
        return $this->hasMany(BillCalendar::class, 'bill_id');
    }
    public function history_items()
    {
        return $this->hasMany(BillHistory::class, 'bill_id');
    }
    public function progress()
    {
        return $this->hasMany(BillProgress::class, 'bill_id');
    }
    public function reasons()
    {
        return $this->hasMany(BillReason::class, 'bill_id');
    }
    public function referrals()
    {
        return $this->hasMany(BillReferral::class, 'bill_id');
    }
    public function sast_items()
    {
        return $this->hasMany(BillSast::class, 'bill_id');
    }
    public function sponsors()
    {
        return $this->hasMany(BillSponsor::class, 'bill_id');
    }
    public function subjects()
    {
        return $this->hasMany(BillSubject::class, 'bill_id');
    }
    public function supplements()
    {
        return $this->hasMany(BillSupplement::class, 'bill_id');
    }
    public function texts()
    {
        return $this->hasMany(BillText::class, 'bill_text');
    }
    public function views()
    {
        return $this->hasMany(BillView::class, 'bill_id');
    }
    public function votes()
    {
        return $this->hasMany(BillVote::class, 'bill_id');
    }

    #endregion

    #region Foreign model assignment attributes

    public function setStateAttribute(State|int $state)
    {
        $state = is_int($state) ? State::find($state) : $state;

        $this->state_id = is_int($state) ? $state : $state->getKey();
        $this->setRelation('state', $state);
    }

    public function setSessionAttribute(Session|int $session)
    {
        $session = is_int($session) ? Session::find($session) : $session;

        $this->session_id = $session->getKey();
        $this->setRelation('session', $session);
    }

    public function setBodyAttribute(Body|int $body)
    {
        $body = is_int($body) ? Body::find($body) : $body;

        $this->body_id = $body->getKey();
        $this->setRelation('body', $body);
    }

    public function setCurrentBodyAttribute(Body|int $current_body)
    {
        $current_body = is_int($current_body) ? Body::find($current_body) : $current_body;

        $this->body_id = $current_body->getKey();
        $this->setRelation('current_body', $current_body);
    }

    public function setBillTypeAttribute(Type|int $bill_type)
    {
        $bill_type = is_int($bill_type) ? Type::find($bill_type) : $bill_type;

        $this->body_id = $bill_type->getKey();
        $this->setRelation('bill_type', $bill_type);
    }

    public function setStatusAttribute(Progress|int $status)
    {
        $status = is_int($status) ? Progress::find($status) : $status;

        $this->body_id = $status->getKey();
        $this->setRelation('progress', $status);
    }

    public function setPendingCommitteeAttribute(Committee|int $pending_committee)
    {
        $pending_committee = is_int($pending_committee) ? Committee::find($pending_committee) : $pending_committee;

        $this->body_id = $pending_committee->getKey();
        $this->setRelation('pending_committee', $pending_committee);
    }

    #endregion

    #region Simplify naming attributes

    public function getNumberAttribute()
    {
        return $this->bill_number;
    }
    public function setNumberAttribute($number)
    {
        $this->bill_number = $number;
    }

    #endregion
}
