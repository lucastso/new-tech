<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [\App\Http\Controllers\Api\ApiPostsController::class, 'index'])->name("api.posts");
Route::get('/posts/avaliar', [\App\Http\Controllers\Api\ApiPostsController::class, 'avaliar'])->name("api.posts.avaliar");
Route::get('/posts/search', [\App\Http\Controllers\Api\ApiPostsController::class, 'search'])->name("api.search");
Route::post('/posts/avaliado', [\App\Http\Controllers\Api\ApiPostsController::class, 'avaliado'])->name("api.posts.avaliado");
Route::post('/posts/deletado', [\App\Http\Controllers\Api\ApiPostsController::class, 'destruido'])->name("api.posts.deletado");
Route::get('/gettag', [\App\Http\Controllers\Api\ApiPostsController::class, 'getTag'])->name("gettag");
