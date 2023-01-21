<?php

namespace App\Models\LegiScan;

use App\Models\Bookmark;
use App\Traits\Models\HasLegiScanShim;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;
    use HasLegiScanShim;

    #region Properties

    protected $table = 'ls_bill';

    protected $primaryKey = 'bill_id';

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

    // One-to-many references

    public function ammendments()
    {
        return $this->hasMany(BillAmendment::class, 'bill_id');
    }

    public function calendarDates()
    {
        return $this->hasMany(BillCalendar::class, 'bill_id');
    }

    public function history()
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

    public function sastItems()
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

    # Morph relationships

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    #endregion

    #region Attributes

    public function getNumberAttribute()
    {
        return $this->bill_number;
    }

    #endregion

    #region Methods

    public function bookmark($scope)
    {
        return Bookmark::getForBill($this, $scope);
    }

    #endregion
}
