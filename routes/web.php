<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PinjamanController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);
Route::get('/profiles', [DashboardController::class, 'profile'])->middleware(['auth']);
Route::get('/profile/edit/{id}', [DashboardController::class, 'editProfile'])->middleware(['auth']);
Route::patch('/profile/edit/{id}', [DashboardController::class, 'updateProfile'])->middleware(['auth']);

// Routes Data Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware(['auth', 'admin', 'owner']);
Route::post('/karyawan', [KaryawanController::class, 'store'])->middleware(['auth']);
Route::get('/karyawan/detail/{id}/', [KaryawanController::class, 'show'])->middleware(['auth', 'admin', 'owner']);
Route::get('/karyawan/edit/{id}/', [KaryawanController::class, 'edit'])->middleware(['auth', 'admin']);
Route::patch('/karyawan/update/{id}', [KaryawanController::class, 'update'])->middleware(['auth', 'admin']);
Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'delete'])->middleware(['auth', 'admin']);

// Routes Data Jabatan
Route::get('/jabatan', [JabatanController::class, 'index'])->middleware(['auth', 'admin', 'owner']);
Route::get('/jabatan/create', [JabatanController::class, 'create'])->middleware(['auth', 'admin', 'owner']);
Route::post('/jabatan', [JabatanController::class, 'store'])->middleware(['auth', 'admin', 'owner']);
Route::get('/jabatan/{id}/', [JabatanController::class, 'edit'])->middleware(['auth', 'admin', 'owner']);
Route::patch('/jabatan/{id}', [JabatanController::class, 'update'])->middleware(['auth', 'admin', 'owner']);
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->middleware(['auth', 'admin', 'owner']);

// Routes Absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->middleware(['auth']);
Route::post('/absensi', [AbsensiController::class, 'absen'])->middleware(['auth']);

// Routes Data Penggajian
Route::get('/payroll', [PayrollController::class, 'index'])->middleware(['auth', 'admin', 'owner']);
Route::get('/payroll/edit/{id}', [PayrollController::class, 'edit'])->middleware(['auth', 'admin', 'owner']);
Route::patch('/payroll/update/{id}', [PayrollController::class, 'update'])->middleware(['auth', 'admin', 'owner']);
Route::get('/payroll/print/{id}', [PayrollController::class, 'print'])->middleware(['auth', 'admin', 'owner']);
Route::get('/exportPDF', [PayrollController::class, 'exportPDF'])->middleware(['auth', 'admin', 'owner']);

// Route Leave Request
Route::get('/leave-request', [LeaveRequestController::class, 'index'])->middleware(['auth']);
Route::get('/leave-request/create', [LeaveRequestController::class, 'create'])->middleware(['auth']);
Route::post('/leave-request', [LeaveRequestController::class, 'store'])->middleware(['auth']);
Route::patch('/leave-request/approved/{id}/', [LeaveRequestController::class, 'approved'])->middleware(['auth']);
Route::patch('/leave-request/rejected/{id}', [LeaveRequestController::class, 'rejected'])->middleware(['auth']);


// Route Pinjaman
Route::get('/pinjaman', [PinjamanController::class, 'index'])->middleware(['auth']);
Route::get('/pinjaman/create', [PinjamanController::class, 'create'])->middleware(['auth']);
Route::post('/pinjaman', [PinjamanController::class, 'store'])->middleware(['auth']);
Route::patch('/pinjaman/approved/{id}/', [PinjamanController::class, 'approved'])->middleware(['auth']);
Route::patch('/pinjaman/rejected/{id}', [PinjamanController::class, 'rejected'])->middleware(['auth']);
// Group Karyawan Routes
require __DIR__ . '/auth.php';
