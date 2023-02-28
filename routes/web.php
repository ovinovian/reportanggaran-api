<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\Anggaran2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', [UserController::class, 'index']);
Route::get('/', [Anggaran2Controller::class, 'index'])->name('anggaran2.index');

Route::get('anggaran2/import', [Anggaran2Controller::class, 'importForm'])->name('anggaran2.import');
Route::post('/anggaran2/import', [Anggaran2Controller::class, 'importStore'])->name('anggaran2.imported');

// Route::get('/anggaran2/capaian', [Anggaran2Controller::class, 'index']);

// Route::get('user/export', [UserController::class, 'export'])->name('user.export');
// Route::get('user/import-template', [UserController::class, 'importTemplate'])->name('user.import.template');
// Route::get('user/import', [UserController::class, 'importForm'])->name('user.import');
// Route::get('user/import', [UserController::class, 'importForm']);
// Route::post('user/import', [UserController::class, 'importStore'])->name('user.import');
// Route::resource('user', UserController::class)->parameters([
//     'user' => 'data'
// ]);

// Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran.index');
// Route::get('anggaran/import', [AnggaranController::class, 'importForm'])->name('anggaran.import');
// Route::get('/anggaran/import', [AnggaranController::class, 'importForm']);
// Route::post('/anggaran/import', [AnggaranController::class, 'importStore'])->name('anggaran.imported');