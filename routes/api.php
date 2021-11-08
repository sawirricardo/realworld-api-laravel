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

Route::post('users/login', \App\Http\Controllers\Api\SanctumTokenController::class);
Route::get('profiles/{user}', [\App\Http\Controllers\Api\UserController::class, 'show']);
Route::post('users', [\App\Http\Controllers\Api\UserController::class, 'store']);
Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'edit'])
    ->middleware(['auth:sanctum']);
Route::put('/user', [\App\Http\Controllers\Api\UserController::class, 'update'])
    ->middleware(['auth:sanctum']);
Route::resource('users', \App\Http\Controllers\Api\UserController::class)
    ->only(['update', 'destroy'])
    ->middleware(['auth:sanctum']);
Route::apiResource('users.followers', \App\Http\Controllers\Api\UserFollowerController::class)
    ->shallow()
    ->only(['store', 'destroy'])
    ->middleware(['auth:sanctum']);
Route::get('articles', [\App\Http\Controllers\Api\ArticleController::class, 'index']);
Route::get('articles/feed', [\App\Http\Controllers\Api\ArticleFeedController::class, 'index'])
    ->middleware(['auth:sanctum']);
Route::get('articles/{article:slug}', [\App\Http\Controllers\Api\ArticleController::class, 'show']);
Route::resource('articles', \App\Http\Controllers\Api\ArticleController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth:sanctum']);
Route::apiResource('articles.comments', \App\Http\Controllers\Api\ArticleCommentController::class)->shallow()
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth:sanctum']);
Route::resource('articles.favorites', \App\Http\Controllers\Api\ArticleFavoriteController::class)
    ->shallow()
    ->only(['store', 'destroy'])
    ->middleware(['auth:sanctum']);

Route::resource('tags', \App\Http\Controllers\Api\TagController::class)
    ->only(['index']);
