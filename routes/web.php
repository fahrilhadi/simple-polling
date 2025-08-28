<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;

Route::resource('/', PollController::class, ['as' => 'poll']);