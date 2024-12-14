<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SessionController;

// Rute untuk Login dan Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk Clients
Route::resource('clients', ClientController::class);

// Rute dengan Middleware auth:sanctum
Route::middleware('auth')->group(function () {
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});
//sini
Route::get('/soal', [QuestionController::class, 'tampil']);
Route::post('/soal', [QuestionController::class, 'questionstore'])->name('questions.questionstore');

    // Rute untuk Modules
    Route::apiResource('modules', ModuleController::class);

    // Rute untuk Sessions
    Route::apiResource('sessions', SessionController::class);
// Rute untuk Dashboard
Route::get('/dashboard', function () {
    return view('questions/dashboard');
})->middleware(['auth']);

Route::get('/modules', function () {
    return view('questions.modules');
})->name('modules');

// Rute Auth
Auth::routes();

// Rute Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
