<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/posts', [PostController::class, 'index'])->name('posts');
Route::get('/dashboard/post/create', [PostController::class, 'create']);
Route::post('/dashboard/post/', [PostController::class, 'store']);  
Route::get('/dashboard/post/{id}', [PostController::class, 'show']);
Route::get('/dashboard/post/{id}/edit', [PostController::class, 'edit']);  
Route::post('/dashboard/post/{id}/edit', [PostController::class, 'update']);  
Route::delete('/dashboard/post/{id}', [PostController::class, 'destroy']);  