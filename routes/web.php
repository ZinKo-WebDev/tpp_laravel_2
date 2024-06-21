<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("category", [CategoryController::class, 'index'])->name('categoryIndex');
    Route::get('category/create', [CategoryController::class, 'create'])->name('categoryCreate');
    Route::post('category/store', [CategoryController::class, 'store'])->name('categoryStore');
    Route::get('category/{id}', [CategoryController::class, 'edit'])->name('categoryEdit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('categoryUpdate');
    Route::post('category/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');

});




require __DIR__.'/auth.php';
