<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;

Route::get('/', [PollController::class, 'index'])->name('poll.index');

Route::resource('poll', PollController::class);

Route::post('/poll/{id}/vote', [PollController::class, 'vote'])->name('poll.vote');
