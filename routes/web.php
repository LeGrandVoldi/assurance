<?php

use App\Http\Controllers\AssuranceSanteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AssuranceSanteController::class, 'index'])->name('assurance.index');
Route::post('/search', [AssuranceSanteController::class, 'search'])->name('assurance.search');
Route::post('/artists/create', [AssuranceSanteController::class, 'create'])->name('assurance.create');
Route::post('/artists/{id}/update', [AssuranceSanteController::class, 'update'])->name('assurance.update');
