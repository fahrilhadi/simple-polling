<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;

Route::get('/', [PollController::class, 'index'])->name('poll.index');

Route::resource('poll', PollController::class);
