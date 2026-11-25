<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MatriculaController::class, 'create'])
    ->name('matriculas.create');

Route::post('/matriculas', [MatriculaController::class, 'store'])
    ->name('matriculas.store');

Route::get('/matriculas/{matricula}', [MatriculaController::class, 'show'])
    ->name('matriculas.show');

Route::resource('cursos', CursoController::class)
    ->except(['show'])
    ->parameters(['cursos' => 'curso']);