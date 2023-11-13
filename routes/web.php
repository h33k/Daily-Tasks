<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'createTask'])->name('tasks.create');

Route::delete('tasks/refresh', [TaskController::class, 'refreshTasks'])->name('tasks.refresh');

Route::post('/tasks', [TaskController::class, 'storeTask'])->name('tasks.store');

Route::put('/tasks/{task}', [TaskController::class, 'updateTask'])->name('tasks.update');

Route::get('/tasks/{task}', [TaskController::class, 'showTask'])->name('tasks.show');

Route::get('/tasks/{task}/edit', [TaskController::class, 'editTask'])->name('tasks.edit');

Route::delete('tasks/{task}', [TaskController::class, 'destroyTask'])->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', [TaskController::class, 'toggleTask'])->name('tasks.toggle-complete');
