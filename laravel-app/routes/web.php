<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  $tasks = Task::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

  return view('dashboard', ['tasks' => $tasks]);
})
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::post('/task', [TaskController::class, 'store'])->name('task.create');
  Route::get('/task/{id}', [TaskController::class, 'edit'])->name('task.edit');
  Route::patch('/task/{id}', [TaskController::class, 'update'])->name('task.update');
  Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
