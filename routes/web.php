<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/dashboard', function () {
    return view('pages/profile/dashboard');
})->middleware(['auth'])->name('dashboard');

// Routes Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/profiles', [DashboardController::class, 'profile']);
Route::get('/profile/edit/{id}', [DashboardController::class, 'editProfile']);
Route::patch('/profile/edit/{id}', [DashboardController::class, 'updateProfile']);

// Routes Data Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::post('/karyawan', [KaryawanController::class, 'store']);
Route::get('/karyawan/{id}/', [KaryawanController::class, 'edit']);
Route::patch('/karyawan/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/{id}', [KaryawanController::class, 'delete']);

// Routes Data Jabatan
Route::get('/jabatan', [JabatanController::class, 'index']);
Route::post('/jabatan', [JabatanController::class, 'store']);
Route::get('/jabatan/{id}/', [JabatanController::class, 'edit']);
Route::patch('/jabatan/{id}', [JabatanController::class, 'update']);
Route::delete('/jabatan/{id}', [JabatanController::class, 'delete']);

// Routes Absensi
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::post('/absensi/in', [AbsensiController::class, 'absensiIn']);
Route::post('/absensi/out', [AbsensiController::class, 'absensiOut']);

// Routes Data Penggajian
Route::get('/payroll', [PayrollController::class, 'index']);
Route::get('/payroll/print/{id}', [PayrollController::class, 'print']);

// Route Leave Request
Route::get('/leave-request', [LeaveRequestController::class, 'index']);
Route::post('/leave-request', [LeaveRequestController::class, 'store']);
Route::get('/leave-request/{id}/', [LeaveRequestController::class, 'edit']);
Route::patch('/leave-request/{id}', [LeaveRequestController::class, 'update']);
Route::delete('/leave-request/{id}', [LeaveRequestController::class, 'delete']);
// Group Admin Routes

// Group Owner Routes

// Group Karyawan Routes
require __DIR__ . '/auth.php';
