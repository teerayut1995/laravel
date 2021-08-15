<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

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

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category_id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::post('/categories/{category_id}', [CategoryController::class, 'update']);
Route::delete('/categories/{category_id}', [CategoryController::class, 'delete']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post_id}', [PostController::class, 'show']);
Route::get('/posts/{post_id}/edit', [PostController::class, 'edit']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/{post_id}', [PostController::class, 'update']);
Route::delete('/posts/{post_id}', [PostController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function() {
	return 'hello';
});

Route::get('/users/{user_id}', function($user_id) {
	return 'hello => ' . $user_id;
});