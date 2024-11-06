<?php

use App\Http\Controllers\ThreadController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/{categoryName}', [ThreadController::class, 'index'])->name('discussion');

Route::post('/{categoryName}/thread', [ThreadController::class, 'store'])->name('thread.post');
