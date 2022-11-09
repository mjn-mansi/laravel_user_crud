<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
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

// =================== User list ======================

Route::controller(UserController::class)->prefix('users')->group(function () {

    Route::get('/', 'index');

    Route::get('/create', 'create');
    Route::post('/', 'store');

    Route::delete('/{user}', 'destroy');

    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
});

// ==================== User Gallery ==================
Route::controller(GalleryController::class)->prefix('users/images')->group(function () {

    Route::get('/', 'index');

    Route::get('/{id}', 'create');
    Route::post('/{id}', 'store');

    Route::delete('/{id}', 'destroy');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
