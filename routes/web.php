<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
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


Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', 'AdminController@adminIndex');
});
Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin.index')->middleware('admin.auth');;
Route::post('/admin/create-user', [AdminController::class, 'createUser'])->name('admin.create-user');

Route::get('/course-details', [CourseController::class, 'showCourseDetails'])->name('course-details');



Route::view('/', 'index');


require __DIR__.'/auth.php';
