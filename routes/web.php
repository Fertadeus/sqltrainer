<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExerciseController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/ejercicio', [ExerciseController::class, 'index'])->name('exercise.index');
Route::get('/ejercicio/{id}', [ExerciseController::class, 'show'])->name('exercise.show');
Route::post('/ejercicio/{id}/run', [ExerciseController::class, 'runQuery'])->name('exercise.run');


