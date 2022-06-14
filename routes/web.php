<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/posts/novo', [\App\Http\Controllers\PostsController::class, 'create']);
Route::post('/posts/novo', [\App\Http\Controllers\PostsController::class, 'store'])->name("registrar.post");
Route::get('/posts/{id}', [\App\Http\Controllers\PostsController::class, 'show']);
Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostsController::class, 'edit']);
Route::post('/posts/{id}/edit', [\App\Http\Controllers\PostsController::class, 'update'])->name("update.post");
Route::get('/posts/{id}/delete', [\App\Http\Controllers\PostsController::class, 'delete']);
Route::post('/posts/{id}/destroy', [\App\Http\Controllers\PostsController::class, 'destroy'])->name("destroy.post");
