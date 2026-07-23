<?php
use App\Http\Controllers\MajorController;
use App\http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolClassController\CreateController;
use App\Http\Controllers\SchoolClassController\DestroyController;
use App\Http\Controllers\SchoolClassController\EditController;
use App\Http\Controllers\SchoolClassController\IndexController;
use App\Http\Controllers\SchoolClassController\ShowController;
use App\Http\Controllers\SchoolClassController\StoreController;
use App\Http\Controllers\SchoolClassController\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::name('students.')->prefix('students')->group(function () {

Route::get('/', [StudentController::class,'index'])->name('index');

Route::get('/{id}', [StudentController::class,'show'])->name('show');

Route::get('/create', [StudentController::class,'create'])->name('create');

Route::get('/{id}/edit', [StudentController::class,'edit'])->name('edit');

Route::post('/', [StudentController::class,'store'])->name('store');

Route::put('/{id}', [StudentController::class,'update'])->name('update');

Route::delete('/{id}', [StudentController::class,'destroy'])->name('destroy');


});
//teacher
Route::name('teachers.')->prefix('teachers')->group(function () {

Route::get('/', [TeacherController::class,'index'])->name('index');

Route::get('/{id}', [TeacherController::class,'show'])->name('show');

Route::get('/create', [TeacherController::class,'create'])->name('create');

Route::get('/{id}/edit', [TeacherController::class,'edit'])->name('edit');

Route::post('/', [TeacherController::class,'store'])->name('store');

Route::put('/{id}', [TeacherController::class,'update'])->name('update');

Route::delete('/{id}', [TeacherController::class,'destroy'])->name('destroy');


});

Route::name('classes.')->prefix('classes')->group(function () {

Route::get('/', [IndexController::class,'index'])->name('index');

Route::get('/{id}', [ShowController::class,'show'])->name('show');

Route::get('/create', [CreateController::class,'create'])->name('create');

Route::get('/{id}/edit', [EditController::class,'edit'])->name('edit');

Route::post('/', [StoreController::class,'store'])->name('store');

Route::put('/{id}', [UpdateController::class,'update'])->name('update');

Route::delete('/{id}', [DestroyController::class,'destroy'])->name('destroy');


});

Route::resource('major', MajorController::class);