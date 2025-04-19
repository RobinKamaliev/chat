<?php

declare(strict_types=1);

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(static function () {
    Route::get('/users', [UserController::class, 'index']);

    Route::prefix('chats')->group(static function () {
        Route::post('/', [ChatController::class, 'store']);
        Route::get('/', [ChatController::class, 'index']);

        Route::get('{chatId}/messages', [MessageController::class, 'index']);
        Route::post('{chatId}/messages', [MessageController::class, 'store']);
    });
});