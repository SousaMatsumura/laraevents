<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\Participant\Dashboard\DashboardController as ParticipantDashboardController;
use App\Http\Controllers\Organization\
    {Dashboard\DashboardController as OrganizationDashboardController,
    Event\EventController};
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

Route::group(['as' => 'auth.'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::get('register', [RegisterController::class, 'create'])->name('register.create');
        Route::post('register', [RegisterController::class, 'store'])->name('register.store');
        Route::get('login', [LoginController::class, 'create'])->name('login.create');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('login.destroy')
        ->middleware('auth');
});

/*Route::get('test', function(){
    $address = App\Models\Address::find(2);
    return $address->user;
});*/

Route::group(['middleware' => 'auth'], function(){
    Route::get('participant/dashboard', [ParticipantDashboardController::class, 'index'])
        ->name('participant.dashboard.index')
        ->middleware('role:participant');

    Route::group([
            'prefix' => 'organization/',
            'as' => 'organization.',
            'middleware' => 'role:organization'
        ], function(){
        Route::get('dashboard', [OrganizationDashboardController::class, 'index'])
            ->name('dashboard.index');
        Route::group(['prefix' => 'events', 'as' => 'events.'], function(){
            Route::get('', [EventController::class, 'index'])->name('index');
            Route::get('/create', [EventController::class, 'create'])->name('create');
            Route::post('', [EventController::class, 'store'])->name('store');
            Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
            Route::put('/{event}', [EventController::class, 'update'])->name('update');
            Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
        });
    });
    
});