<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashControler;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserControler;



Route::middleware(['auth'])->prefix('administrateurs')->group(function () {
    Route::get('/adminDash', [DashControler::class, 'index_admin'])->name('adminDash');

    #Users Routes
    
    Route::get('/users', [UserControler::class, 'index'])->name('user.admin.index');
    Route::post('/users/store/', [UserControler::class, 'store'])->name('user.admin.store');
    Route::put('/users/update/{id}', [UserControler::class, 'update'])->name('user.admin.update');
    Route::delete('/users/destroy/{id}', [UserControler::class, 'destroy'])->name('user.admin.destroy');


    #Users Routes
    
    Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.admin.index');
    Route::get('/tickets/scanner', [TicketController::class, 'index_scanner'])->name('ticket.admin.index_scanner');
    Route::post('/tickets/store/scanner', [TicketController::class, 'store_scanner'])->name('ticket.admin.store_scanner');
    Route::post('/tickets/store/', [TicketController::class, 'store'])->name('ticket.admin.store');
    Route::put('/tickets/update/{id}', [TicketController::class, 'update'])->name('ticket.admin.update');
    Route::delete('/tickets/destroy/{id}', [TicketController::class, 'destroy'])->name('ticket.admin.destroy');

});