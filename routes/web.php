<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);


Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/ejercicio', [ExerciseController::class, 'index']);
    Route::get('/ejercicio/{id}', [ExerciseController::class, 'show'])->name('exercise.show');
    Route::post('/ejercicio/{id}/run', [ExerciseController::class, 'runQuery'])->name('exercise.run');

});


require __DIR__.'/auth.php';