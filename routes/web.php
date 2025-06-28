<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

Route::get('tasks/completed', [TaskController::class, 'completed'])->name('tasks.completed');


Route::get('tasks/pending', [TaskController::class, 'pending'])->name('tasks.pending');

Route::resource('tasks', TaskController::class);

Route::patch('tasks/{task}/toogle', [TaskController::class, 'toogle'])->name('tasks.toogle');