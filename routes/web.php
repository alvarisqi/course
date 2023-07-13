<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::resource('courses', CourseController::class);
Route::resource('courses.materials', MaterialController::class);
Route::resource('materials', MaterialController::class);
Route::match(['get', 'post'], '{course}/materials/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::put('/materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('/materials/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

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
    return view('courses.index');
});
