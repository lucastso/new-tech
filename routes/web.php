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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
    Route::get('/posts/novo', [\App\Http\Controllers\PostsController::class, 'create']);
    Route::get('/posts/myposts', [\App\Http\Controllers\PostsController::class, 'getUserPosts']);
    Route::post('/posts/novo', [\App\Http\Controllers\PostsController::class, 'store'])->name("registrar.post");
    Route::get('/posts/{id}', [\App\Http\Controllers\PostsController::class, 'show']);
    Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostsController::class, 'edit']);
    Route::post('/posts/{id}/update', [\App\Http\Controllers\PostsController::class, 'update'])->name("update.post");
    Route::get('/perfil/{id}/edit', [\App\Http\Controllers\PostsController::class, 'perfil']);
    Route::post('/perfil/{id}/update', [\App\Http\Controllers\PostsController::class, 'updatePerfil'])->name("update.perfil");
    Route::get('/posts/{id}/delete', [\App\Http\Controllers\PostsController::class, 'delete']);
    Route::post('/posts/destroy', [\App\Http\Controllers\PostsController::class, 'destroy'])->name("destroy.post");
});

Route::prefix('avaliador')->middleware(['auth', 'level'])->group(function () {
    Route::get('/avaliar', [\App\Http\Controllers\PostsController::class, 'avaliar']);
});
