<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route for publisher
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
    Route::get('/publishers/create', [PublisherController::class, 'create'])->name('publishers.create');
    Route::post('/publishers/create', [PublisherController::class, 'store'])->name('publishers.store');
    Route::get('/publishers/{publisher}/edit', [PublisherController::class, 'edit'])->name('publishers.edit');
    Route::patch('/publishers/{publisher}', [PublisherController::class, 'update'])->name('publishers.update');
    Route::delete('/publishers/{publisher}/delete', [PublisherController::class, 'destroy'])->name('publishers.destroy');
});

// Route for category
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books/create', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}/delete', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
