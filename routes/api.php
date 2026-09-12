<?php

use App\Http\Controllers\Api\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TicketApprovalController;

Route::middleware('auth')->group(function () {

    Route::get('/tickets', [TicketController::class, 'index']);

    Route::post('/tickets', [TicketController::class, 'store']);

    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

});

Route::middleware(['auth', 'role:admin_level_1'])->prefix('admin')->group(function(){

    Route::post('/tickets/{ticket}/approve', [TicketApprovalController::class,'approve']);

    Route::post('/tickets/{ticket}/reject', [TicketApprovalController::class,'reject']);

});

Route::middleware(['auth', 'role:admin_level_2'])->prefix('admin')->group(function(){

    Route::post('/tickets/{ticket}/approve', [TicketApprovalController::class,'approve']);

});
