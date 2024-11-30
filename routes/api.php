<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/dashboard', function (Request $request) {
    $user = $request->user();

    $stats = [
        'total_sessions' => $user->sessions()->count(),
        'average_quiz_score' => round($user->quizResults()->avg('score'), 2),
        'total_notes' => $user->progressNotes()->count(),
    ];

    return response()->json($stats, 200);
});
Route::middleware('auth:sanctum')->post('/send-reminder', [UserController::class, 'sendReminder']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
