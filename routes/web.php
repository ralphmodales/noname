<?php

use App\Models\Category;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}); */

Route::get('/', function () {
    $categories = Category::select('name')->get();
    return Inertia::render('Home', ['categories' => $categories]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/t/{categoryName}', [ThreadController::class, 'index'])->name('discussion');

Route::post('/t/{categoryName}/thread', [ThreadController::class, 'store'])->name('thread.post');
Route::post('/t/{categoryName}/comment', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comment.post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
