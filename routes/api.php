<?php

use App\Http\Controllers\AstrologerController;
use App\Http\Controllers\OrderController;
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

Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('astrologer')->group(function () {
            Route::get('all', [AstrologerController::class, 'all']);
            Route::get('details/{astrologerId}', [AstrologerController::class, 'details']);
        });
        Route::prefix('order')->group(function () {
            Route::post('make', [OrderController::class, 'make']);
            Route::post('payment', [OrderController::class, 'payment']);
        });
    });
});
