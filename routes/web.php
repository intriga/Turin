<?php

use Illuminate\Support\Facades\Route;

// backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;

// frontend
use App\Http\Controllers\Frontend\HomeController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/{id}', [HomeController::class, 'show']);

// Dashboard
Route::middleware(['auth', 'dashboard'])->prefix('dashboard')->namespace('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/', [PostController::class, 'store']);  
    Route::get('/post/{id}', [PostController::class, 'show']);
    Route::get('/post/{id}/edit', [PostController::class, 'edit']);  
    Route::post('/post/{id}/edit', [PostController::class, 'update']);  
    Route::delete('/post/{id}', [PostController::class, 'destroy']);  

});