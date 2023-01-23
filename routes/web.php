<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Group\MemberController;
use App\Http\Controllers\Group\WorkspaceController;
use App\Http\Controllers\Group\NavigateYearController;
use App\Http\Controllers\Group\NavigateStateController;
use App\Http\Controllers\Group\Workspace\TopicController;
use App\Http\Controllers\Group\Workspace\HearingController;
use App\Http\Controllers\Group\Workspace\Topic\BillSearchController;

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

// Public routes
Route::get('/', fn () => redirect('/dashboard'))->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Routes requiring authentication
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Groups
    Route::prefix('groups')->name('groups.')->middleware('can:view,group')->group(function () {
        Route::get('{group}', [GroupController::class, 'show'])->name('show');
        Route::get('{group}/members', [MemberController::class, 'index'])->name('members.index');

        // Saves year & state to session variable
        Route::put('{group}/navigate-year', [NavigateYearController::class, 'update'])->name('navigate.year.update');
        Route::put('{group}/navigate-state', [NavigateStateController::class, 'update'])->name('navigate.state.update');

        // Workspaces
        Route::prefix('{group}/workspaces')->name('workspaces.')->group(function () {
            Route::get('{workspace}', [WorkspaceController::class, 'show'])->name('show');

            Route::get('{workspace}/states/{state}/years/{year}/hearings', [HearingController::class, 'index'])->name('states.years.hearings.index');

            // Topics
            Route::prefix('{workspace}/topics')->name('topics.')->group(function () {
                Route::get('{topic}', [TopicController::class, 'show'])->name('show');
                Route::get('{topic}/search', [BillSearchController::class, 'show'])->name('bill-search.show');
            });
        });
    });
});
