<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
    return view('welcome');
});
Route::get('/create', function () {
    return view('create');
});
Route::post('/create', [PostController::class, 'create']);
Route::get('/list', [PostController::class, 'list']);
Route::get('/detail/{id}', [PostController::class, 'show']);
Route::get('/delete/{id}', [PostController::class, 'destroy']);
Route::get('/update/{id}', [PostController::class, 'showUpdate']);
Route::post('/update/{id}', [PostController::class, 'update']);
Route::post('/comment/{id}',[CommentController::class, 'store']);


