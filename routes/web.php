<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GroupAboutController;
use App\Http\Controllers\Pages\User\GroupBillSearchController;
use App\Http\Controllers\Pages\User\GroupController;
use App\Http\Controllers\Pages\User\GroupSessionController;
use App\Http\Controllers\Pages\User\GroupStateController;
use App\Http\Controllers\Pages\User\HomeController as UserHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/state/{state}', [StateHomeController::class, 'index'])->name('state.home.index');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth')->group(function(){

    Route::get('/', [UserHomeController::class, 'index'])->name('user.home.index');

    // Group -> Workspace -> Topic -> State -> Session
    Route::get('group/{group}', [GroupController::class, 'show'])->name('group.show');
    Route::get('group/{group}/about', [GroupAboutController::class, 'show'])->name('group.about.show');
    Route::get('group/{group}/state', [GroupStateController::class, 'index'])->name('group.state.index');
    Route::get('group/{group}/state/{state}', [GroupStateController::class, 'show'])->name('group.state.show');
    Route::get('group/{group}/state/{state}/session/{session}', [GroupSessionController::class, 'show'])->name('group.session.show');
    Route::get('group/{group}/state/{state}/session/{session}/search', [GroupBillSearchController::class, 'show'])->name('group.bill-search.show');

});
