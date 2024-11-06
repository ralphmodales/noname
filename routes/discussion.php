<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/{categoryName}', function () {
    return Inertia::render('Discussion/Index');
})->name('discussion');
