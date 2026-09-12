<?php

use App\Http\Controllers\Admin\AdminTicketPageController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketPageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
        Route::get('/tickets', [TicketPageController::class,'index']);
    });

Route::get('/tickets/create', function(){
        return Inertia::render('Tickets/Create');
    }
)
    ->middleware('auth');

Route::post('/tickets', [TicketController::class,'store'])->middleware('auth');

Route::get('/admin/tickets', [AdminTicketPageController::class,'index'])
    ->middleware(['auth', 'role:admin_level_1']);

Route::get('/admin/tickets/level-two', [AdminTicketPageController::class,'levelTwo'])
    ->middleware(['auth', 'role:admin_level_2']);

require __DIR__.'/auth.php';
