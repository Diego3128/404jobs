<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

Route::get('/', function () {
    return view('welcome');
});

// Vacancy
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('/vacancy/create', [VacancyController::class, 'create'])->name('vacancies.create');
    Route::get('/vacancy/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit')->middleware(['can:update,vacancy']);
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
