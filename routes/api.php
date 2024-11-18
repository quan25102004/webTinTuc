<?php

// use App\Http\Controllers\Api\CategoryController;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('admin/categories',CategoryController::class);
Route::get('categories/trash', [CategoryController::class,'trash'])->name('categories.trash');
Route::post('categories/{id}/restore', [CategoryController::class,'restore'])->name('categories.restore');

Route::apiResource('admin/posts',PostController::class);
Route::get('posts/trash', [PostController::class,'trash'])->name('posts.trash');
Route::post('posts/{id}/restore', [PostController::class,'restore'])->name('posts.restore');