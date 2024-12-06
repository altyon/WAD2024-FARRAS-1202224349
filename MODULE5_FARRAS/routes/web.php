<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    $nav = 'Dashboard';
    return view('dashboard', compact('nav'));
})->name('dashboard');

Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer.index');

Route::get('/lecturer/create', [LecturerController::class, 'create'])->name('lecturer.create');

Route::post('/lecturer', [LecturerController::class, 'store'])->name('lecturer.store');

Route::get('/lecturer/{lecturer}', [LecturerController::class, 'show'])->name('lecturer.show');

Route::get('/lecturer/{lecturer}/edit', [LecturerController::class, 'edit'])->name('lecturer.edit');

Route::put('/lecturer/{lecturer}', [LecturerController::class, 'update'])->name('lecturer.update');

Route::delete('/lecturer/{lecturer}', [LecturerController::class, 'destroy'])->name('lecturer.destroy');

Route::get('/student', [StudentController::class, 'index'])->name('student.index');

Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');

Route::post('/student', [StudentController::class, 'store'])->name('student.store');

Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');

Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');

Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');

Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
