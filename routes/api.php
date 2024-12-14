<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
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
Route::apiResource('modules', ModuleController::class);
Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::apiResource('questions', QuestionController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/questions', [QuestionController::class, 'index']);
    Route::post('/questions', [QuestionController::class, 'store']);
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->post('/send-reminder', [UserController::class, 'sendReminder']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
