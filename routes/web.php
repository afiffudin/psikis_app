<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QuestionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('clients', ClientController::class);
Route::get('/questions', [QuestionController::class, 'index']);
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('modules', ModuleController::class);
    Route::apiResource('sessions', SessionController::class);
    Route::apiResource('progress-notes', ProgressNoteController::class);
});

