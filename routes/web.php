<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [StudentController::class, 'index']);
Route::get('/students', [StudentController::class, 'index'])->name('students.view');


Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');