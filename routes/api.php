<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AccountController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

//charges
Route::post('/charges/add/{id}', [AccountController::class, 'addCharges'])->name('charges.add');

