<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Vacancy
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [VacancyController::class, 'index'])->name('vacancies.index')->middleware(['checkrole']);
    Route::get('/vacancy/create', [VacancyController::class, 'create'])->name('vacancies.create');
    Route::get('/vacancy/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit')->middleware(['can:update,vacancy']);

    Route::get('/vacancy/{vacancy}', [VacancyController::class, 'show'])->name('vacancies.show')->withoutMiddleware(['auth', 'verified']);
});
// Notifications and candidates
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/notifications', NotificationController::class)->name('notifications')->middleware(['checkrole']);

    Route::get('/candidates/{vacancy}', [CandidateController::class, 'index'])->name('candidates.index')->middleware(['can:view,vacancy']);
});


// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
