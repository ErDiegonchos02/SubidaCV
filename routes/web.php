<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CVController;   // ← ESTA LÍNEA FALTABA

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/cv', [CVController::class, 'showForm']);
    Route::post('/cv/upload', [CVController::class, 'upload']);
    Route::get('/cv/download', [CVController::class, 'download']);
    Route::delete('/cv/delete', [CVController::class, 'delete'])->name('cv.delete');

});
use Illuminate\Support\Facades\RateLimiter;

RateLimiter::for('login', function ($request) {
    return Limit::perMinute(5)->by($request->email.$request->ip());
});

