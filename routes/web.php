<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AttendanceRuleController;

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('student', StudentController::class);
Route::resource('classroom', ClassroomController::class);
Route::resource('clock-settings', AttendanceRuleController::class);
Route::resource('attendance', AttendanceController::class);
Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');
Route::post('permissions/{user}', [PermissionController::class, 'store'])->name('permissions-store');
Route::get('presence', function (){
    return view('student.presence');
});
Route::get('student-attendance', [AttendanceController::class, 'studentAttendance'])->name('student-attendance');
