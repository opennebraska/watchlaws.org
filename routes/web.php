<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Group\BookmarkController;
use App\Http\Controllers\Group\HearingController as GroupHearingController;
use App\Http\Controllers\Group\MemberController;
use App\Http\Controllers\Group\NavigateStateController;
use App\Http\Controllers\Group\NavigateYearController;
use App\Http\Controllers\Group\Workspace\BillSearchController;
use App\Http\Controllers\Group\Workspace\HearingController;
use App\Http\Controllers\Group\Workspace\TopicController;
use App\Http\Controllers\Group\Workspace\TopicSectionController;
use App\Http\Controllers\Group\WorkspaceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
        Route::get('{group}/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
        Route::get('{group}/members', [MemberController::class, 'index'])->name('members.index');
        Route::get('{group}/hearings', [GroupHearingController::class, 'index'])->name('hearings.index');

        // Saves year & state to session variable
        Route::put('{group}/navigate-year', [NavigateYearController::class, 'update'])->name('navigate.year.update');
        Route::put('{group}/navigate-state', [NavigateStateController::class, 'update'])->name('navigate.state.update');

        // Workspaces
        Route::prefix('{group}/workspaces')->name('workspaces.')->group(function () {
            Route::get('{workspace}', [WorkspaceController::class, 'show'])->name('show');
            Route::get('{workspace}/search', [BillSearchController::class, 'show'])->name('bill-search.show');
            Route::get('{workspace}/hearings', [HearingController::class, 'index'])->name('hearings.index');

            // Topic sections
            Route::get('{workspace}/topic-sections', [TopicSectionController::class, 'index'])->name('topic-sections.index');
            Route::prefix('{workspace}/topic-sections')->name('topic-sections.')->group(function () {
                // Topics
                Route::get('{topic-section}/topics', [TopicController::class, 'index'])->name('topics.index');
                Route::prefix('{topic-section}/topics')->name('topics.')->group(function () {
                    Route::get('{topic}', [TopicController::class, 'show'])->name('show');
                });
            });
        });
    });
});
