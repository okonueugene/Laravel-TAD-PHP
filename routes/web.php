<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AttendanceDeviceController;

Route::get('/admin/attendance-device', [AttendanceDeviceController::class, 'index']);
Route::get('/admin/attendance/monthly', [AttendanceDeviceController::class, 'monthlyAttendance'])->name('admin.attendance.monthly');
Route::get('/admin/employee/{pin}/attendance', [AttendanceDeviceController::class, 'employeeAttendanceDetails'])->name('admin.employee.attendance.details');

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
    return view('welcome');
});
