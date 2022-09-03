<?php

#region imports

use App\Http\Resources\LegiScan\BillDetail;
use App\Http\Resources\LegiScan\BillDetailResource;
use App\Models\LegiScan\Bill;
use App\Models\LegiScan\BillAmendment;
use App\Models\LegiScan\BillAmendmentView;
use App\Models\LegiScan\BillCalendar;
use App\Models\LegiScan\BillCalendarView;
use App\Models\LegiScan\BillHistory;
use App\Models\LegiScan\BillHistoryView;
use App\Models\LegiScan\BillProgress;
use App\Models\LegiScan\BillReason;
use App\Models\LegiScan\BillReasonView;
use App\Models\LegiScan\BillReferral;
use App\Models\LegiScan\BillReferralView;
use App\Models\LegiScan\BillSast;
use App\Models\LegiScan\BillSastView;
use App\Models\LegiScan\BillSponsor;
use App\Models\LegiScan\BillSponsorView;
use App\Models\LegiScan\BillSubject;
use App\Models\LegiScan\BillSubjectView;
use App\Models\LegiScan\BillSupplement;
use App\Models\LegiScan\BillSupplementView;
use App\Models\LegiScan\BillText;
use App\Models\LegiScan\BillTextView;
use App\Models\LegiScan\BillView;
use App\Models\LegiScan\BillVote;
use App\Models\LegiScan\BillVoteDetail;
use App\Models\LegiScan\BillVoteDetailView;
use App\Models\LegiScan\BillVoteView;
use App\Models\LegiScan\Body;
use App\Models\LegiScan\Committee;
use App\Models\LegiScan\EventType;
use App\Models\LegiScan\Ignore;
use App\Models\LegiScan\MimeType;
use App\Models\LegiScan\Monitor;
use App\Models\LegiScan\Party;
use App\Models\LegiScan\People;
use App\Models\LegiScan\Progress;
use App\Models\LegiScan\Reason;
use App\Models\LegiScan\Role;
use App\Models\LegiScan\SastType;
use App\Models\LegiScan\Session;
use App\Models\LegiScan\Signal;
use App\Models\LegiScan\SponsorType;
use App\Models\LegiScan\Stance;
use App\Models\LegiScan\State;
use App\Models\LegiScan\Subject;
use App\Models\LegiScan\SupplementType;
use App\Models\LegiScan\TextType;
use App\Models\LegiScan\Type;
use App\Models\LegiScan\Variable;
use App\Models\LegiScan\Vote;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

#endregion

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('legiscan/raw-data')->group(function(){

    $models = [

        Bill::class,
        BillView::class,

        BillAmendment::class,
        BillAmendmentView::class,

        BillCalendar::class,
        BillCalendarView::class,

        BillHistory::class,
        BillHistoryView::class,

        BillProgress::class,

        BillReason::class,
        BillReasonView::class,

        BillReferral::class,
        BillReferralView::class,

        BillSast::class,
        BillSastView::class,

        BillSponsor::class,
        BillSponsorView::class,

        BillSubject::class,
        BillSubjectView::class,

        BillSupplement::class,
        BillSupplementView::class,

        BillText::class,
        BillTextView::class,

        BillVote::class,
        BillVoteView::class,

        BillVoteDetail::class,
        BillVoteDetailView::class,

        Body::class,
        Committee::class,
        EventType::class,
        Ignore::class,
        MimeType::class,
        Monitor::class,
        Party::class,
        People::class,
        Progress::class,
        Reason::class,
        Role::class,
        SastType::class,
        Session::class,
        Signal::class,
        SponsorType::class,
        Stance::class,
        State::class,
        Subject::class,
        SupplementType::class,
        TextType::class,
        Type::class,
        Variable::class,
        Vote::class,

    ];

    foreach ($models as $model) {

        $table = app($model)->getTable();
        $table_name_parts = explode('_', $table);
        $prefix = array_shift($table_name_parts);

        $path = implode('-', $table_name_parts);
        if ($prefix == 'ls') {
            // pass
        }
        else if ($prefix == 'lsv') {
            $path .= '-view';
        }
        else {
            $path = $prefix.'-'.$path;
        }

        // Get the collection
        Route::get($path, function() use ($model) {
            return JsonResource::collection($model::all());
        });

        // Get the resource
        Route::get($path.'/{id}', function($id) use ($model) {
            return new JsonResource($model::find($id));
        });

    }

});
Route::prefix('legiscan')->group(function(){

    // Default is NE (state) and current session.

    // bill-summary
    // bill-summary/{$bill_id}
    // bill-detail/{$bill_id}

    // bill-vote-summary
    // bill-vote-summary/{$bill_id}

    Route::get('bill', function(){
        return BillDetailResource::collection(Bill::all());
    });
    Route::get('bill/{id}', function($id){
        return new BillDetailResource(Bill::find($id));
    });

});
