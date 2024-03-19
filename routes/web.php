<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todo', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/todo', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/todo/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/todo/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
