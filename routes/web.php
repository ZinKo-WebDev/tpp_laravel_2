<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// '/' => home

// -----------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('category', [CategoryController::class,'index'])->name('categoryIndex');
Route::get('product', [ProductController::class,'index'])->name('productIndex');

Route::get('/category/create', [CategoryController::class,'create'])->name('categoryCreate');
Route::post('/category/store', [CategoryController::class,'store'])->name('categoryStore');

Route::get('/category/{id}', [CategoryController::class,'edit'])->name('categoryEdit');
Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('categoryUpdate');

Route::get('/product/create', [ProductController::class,'create'])->name('productCreate');
Route::post('/product/store', [ProductController::class,'store'])->name('productStore');

Route::get('/product/{id}', [ProductController::class,'edit'])->name('productEdit');
Route::post('/product/update/{id}', [ProductController::class,'update'])->name('productUpdate');

Route::post('/category/{deldata}', [CategoryController::class,'destroy'])->name('categoryDelete');
Route::post('/product/{productdel}', [ProductController::class,'destroy'])->name('productDelete');

Route::resource('articles', ArticleController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [App\Http\Controllers\HomeController::class, 'mIndex']);

Route::get('/list',fn()=>view('list'))->name('list');

// new route for role / permission dynamically crud
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class,'destroy']);
Route::get('roles/{roleId}/delete', [RoleController::class,'destroy']);

Route::get('roles/{roleId}/give-permissions', [RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class,'givePermissionToRole']);

Route::resource('users', UserController::class);
Route::get('users/{userID}/delete', [UserController::class,'destroy']);

// students and courses
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
