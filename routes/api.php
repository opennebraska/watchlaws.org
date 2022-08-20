<?php

use App\Http\Resources\LegiScanBillResource;
use App\Http\Resources\LegiScanBillViewResource;
use App\Models\LegiScanBill;
use App\Models\LegiScanBillView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('legiscan')->group(function(){

    Route::get('bill', function(){
        return LegiScanBillResource::collection(LegiScanBill::paginate());
    });

    Route::get('bill/{id}', function($id){
        return new LegiScanBillResource(LegiScanBill::find($id));
    });

    Route::get('bill-view', function(){
        return LegiScanBillViewResource::collection(LegiScanBillView::paginate());
    });

    Route::get('bill-view/{id}', function($id){
        return new LegiScanBillViewResource(LegiScanBillView::find($id));
    });

});
