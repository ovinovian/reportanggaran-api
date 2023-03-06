<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\Anggaran2Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SistemLoginController;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/detil-peropd', [DashboardController::class, 'detil_peropd'])->name('detil-peropd');
Route::get('/detil-persubopd/{kode_opd}', [DashboardController::class, 'detil_persubopd'])->name('detil-persubopd');
Route::get('/detil-persubkegiatan/{kode_opd}', [DashboardController::class, 'detil_persubkegiatan'])->name('detil-persubkegiatan');

//sistem register dan login
Route::get('/register', [SistemLoginController::class, 'register_akun'])->name('register.user');
Route::post('/proses_register', [SistemLoginController::class, 'proses_register'])->name('proses.register');
Route::get('/login', [SistemLoginController::class, 'halaman_login'])->name('login.user');
Route::post('/verifikasilogin', [SistemLoginController::class, 'login_verifikasi'])->name('verifikasi.login');
Route::get('/logout', [SistemLoginController::class, 'log_out'])->name('logout.user');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard-detil-peropd', [DashboardController::class, 'dashboard_detil_peropd'])->name('dashboard-detil-peropd');
Route::get('/dashboard-detil-persubopd/{kode_opd}', [DashboardController::class, 'dashboard_detil_persubopd'])->name('dashboard-detil-persubopd');
Route::get('/dashboard-detil-persubkegiatan/{kode_opd}', [DashboardController::class, 'dashboard_detil_persubkegiatan'])->name('dashboard-detil-persubkegiatan');

// Route::get('/', [Anggaran2Controller::class, 'index'])->name('anggaran2.index');

Route::get('/rincian', [Anggaran2Controller::class, 'index'])->name('rincian.index');
Route::get('rincian/import', [Anggaran2Controller::class, 'importForm'])->name('rincian.import');
Route::post('/rincian/import', [Anggaran2Controller::class, 'importStore'])->name('rincian.imported');

Route::get('/realisasi', [AnggaranController::class, 'index'])->name('realisasi.index');
Route::get('realisasi/import', [AnggaranController::class, 'importForm'])->name('realisasi.import');
Route::post('/realisasi/import', [AnggaranController::class, 'importStore'])->name('realisasi.imported');

// Route::get('/anggaran2/capaian', [Anggaran2Controller::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::get('user/export', [UserController::class, 'export'])->name('user.export');
Route::get('user/import-template', [UserController::class, 'importTemplate'])->name('user.import.template');
Route::get('user/import', [UserController::class, 'importForm'])->name('user.import');
Route::post('user/import', [UserController::class, 'importStore'])->name('user.imported');
Route::resource('user', UserController::class)->parameters([
    'user' => 'data'
]);

// Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran.index');
// Route::get('anggaran/import', [AnggaranController::class, 'importForm'])->name('anggaran.import');
// Route::get('/anggaran/import', [AnggaranController::class, 'importForm']);
// Route::post('/anggaran/import', [AnggaranController::class, 'importStore'])->name('anggaran.imported');