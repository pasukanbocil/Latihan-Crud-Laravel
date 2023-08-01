<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExtracurriculerController;
use App\Http\Controllers\TeacherController;

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

Route::get('/', function () {
    return view('home', [
        'name' => 'Dicky Satria Putra Herlambang',
        'role' => 'Admin',
        'mobil' => ['Toyota MR 2', 'Kijang LGX', 'BMW 320i', 'Avanza']
    ]);
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::get('/student-add', [StudentController::class, 'create']);
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::get('/student-delete/{id}', [StudentController::class, 'delete']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore']);

Route::get('/class', [ClassController::class, 'index']);
Route::get('/class-detail/{id}', [ClassController::class, 'show']);
Route::get('/class-add', [ClassController::class, 'create']);
Route::post('/class', [ClassController::class, 'store']);
Route::get('/class-edit/{id}', [ClassController::class, 'edit']);
Route::put('/class/{id}', [ClassController::class, 'update']);
Route::get('/class-delete/{id}', [ClassController::class, 'delete']);
Route::delete('/class-destroy/{id}', [ClassController::class, 'destroy']);
Route::get('/class-deleted', [ClassController::class, 'deletedClass']);
Route::get('/class/{id}/restore', [ClassController::class, 'restore']);



Route::get('/extracurriculer', [ExtracurriculerController::class, 'index']);
Route::get('/extracurriculer-detail/{id}', [ExtracurriculerController::class, 'show']);
Route::get('/eskul-add', [ExtracurriculerController::class, 'create']);
Route::post('/eskul', [ExtracurriculerController::class, 'store']);
Route::get('/extracurriculer-edit/{id}', [ExtracurriculerController::class, 'edit']);
Route::put('/extracurriculer/{id}', [ExtracurriculerController::class, 'update']);
Route::get('/extracurriculer-delete/{id}', [ExtracurriculerController::class, 'delete']);
Route::delete('/extracurriculer-destroy/{id}', [ExtracurriculerController::class, 'destroy']);
Route::get('/extracurriculer-deleted', [ExtracurriculerController::class, 'deletedExtracurriculer']);
Route::get('/extracurriculer/{id}/restore', [ExtracurriculerController::class, 'restore']);


Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher-detail/{id}', [TeacherController::class, 'show']);
Route::get('/teacher-add', [TeacherController::class, 'create']);
Route::post('/teacher', [TeacherController::class, 'store']);
Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit']);
Route::put('/teacher/{id}', [TeacherController::class, 'update']);
Route::get('/teacher-delete/{id}', [TeacherController::class, 'delete']);
Route::delete('/teacher-destroy/{id}', [TeacherController::class, 'destroy']);
Route::get('/teacher-deleted', [TeacherController::class, 'deletedTeacher']);
Route::get('/teacher/{id}/restore', [TeacherController::class, 'restore']);
