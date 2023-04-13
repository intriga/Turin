<?php

use Illuminate\Support\Facades\Route;

// frontend
use App\Http\Controllers\Frontend\FrontendController;

// backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CategoryController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


// frontend
Route::get('/', [FrontendController::class, 'index']);
Route::get('/post/{slug}/', [FrontendController::class, 'show']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Dashboard
Route::middleware(['auth', 'dashboard'])->prefix('dashboard')->namespace('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // module post
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/', [PostController::class, 'store']);  
    Route::get('/post/{slug}', [PostController::class, 'show']);
    Route::get('/post/{id}/edit', [PostController::class, 'edit']);  
    Route::post('/post/{id}/edit', [PostController::class, 'update']);  
    Route::delete('/post/{id}', [PostController::class, 'destroy']);  

    // Module categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/', [CategoryController::class, 'store']);  
    Route::get('/category/{slug}', [CategoryController::class, 'show']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/category/{id}/edit', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);  

});