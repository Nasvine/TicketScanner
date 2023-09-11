<?php

use App\Http\Controllers\DashControler;
use Illuminate\Support\Facades\Route;


Route::get('/visitorDash', [DashControler::class, 'index_visitor'])->name('visitorDash');